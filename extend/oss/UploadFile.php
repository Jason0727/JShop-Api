<?php
/**
 * Created by PhpStorm
 * User: Jason
 * Date: 2020-06-08
 * Time: 16:55
 */

namespace oss;


use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Exception;

class UploadFile
{
    /**
     * Oss对象
     *
     * @var \Illuminate\Contracts\Filesystem\Filesystem
     */
    protected $disk;

    /**
     * 文件对象
     *
     * @var
     */
    protected $file;

    /**
     * 保存文件名
     *
     * @var
     */
    protected $filename;

    /**
     * 保存文件目录
     *
     * @var
     */
    protected $dir;

    /**
     * UploadFile constructor.
     * @param UploadedFile $file
     * @param string $dir
     */
    public function __construct(UploadedFile $file, string $dir = "images")
    {
        $this->disk = Storage::disk('oss');
        $this->file = $file;
        $this->dir = $dir;
    }

    /**
     * 获取文件扩展名
     *
     * @return string
     */
    private function getExt()
    {
        return $this->file->getClientOriginalExtension();
    }

    /**
     * 设置保存文件名
     *
     * @return string
     */
    private function setFilename()
    {
        return $this->filename = md5(uniqid() . microtime()) . "." . $this->getExt();
    }

    /**
     * 设置保存目录
     *
     * @return string
     */
    private function setSaveDir()
    {
        return $this->dir . "/" . Carbon::now()->toDateString() . "/";
    }

    /**
     * 执行
     *
     * @return bool
     */
    public function exec()
    {
        try {
            $saveDir = $this->setSaveDir();

            $filename = $this->setFilename();

            $this->disk->putFileAs($saveDir, $this->file, $filename);

            return $this->disk->getUrl($saveDir . $filename);
        } catch (Exception $exception) {
            Log::error("Oss上传文件失败，原因:" . $exception->getMessage());
            return false;
        }
    }
}