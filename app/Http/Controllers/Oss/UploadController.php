<?php
/**
 * Created by PhpStorm
 * User: Jason
 * Date: 2020-06-08
 * Time: 16:52
 */

namespace App\Http\Controllers\Oss;


use App\Constant\ApiConstant;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use oss\UploadFile;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class UploadController extends Controller
{
    /**
     * 上传文件
     *
     * @param Request $request
     * @return false|string
     *
     * 参数说明:
     * file 文件名
     * dir  保存路径，默认:images
     */
    public function __invoke(Request $request)
    {
        # 文件校验
        $file = $request->file('file');
        if (empty($file) || !$file->isValid()) throw new BadRequestHttpException('文件无效');
        # 保存目录
        $dir = $request->post('dir', 'images');
        # 上传
        $ossPutFile = new UploadFile($file, $dir);
        $result = $ossPutFile->exec();
        if ($result === false) throw new BadRequestHttpException('文件上传失败');

        return apiResponse(ApiConstant::SUCCESS, ApiConstant::SUCCESS_MSG, ['url' => $result]);
    }
}