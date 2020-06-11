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
use oss\PutFile;

class CommonController extends Controller
{
    /**
     * 通用文件上传
     *
     * @param Request $request
     * @return false|string
     */
    public function putFile(Request $request)
    {
        try {
            # 文件校验
            $file = $request->file('common');
            if (empty($file) || !$file->isValid()) throw new Exception('文件无效');
            # 保存目录
            $dir = $request->post('dir', 'images');
            # 上传
            $ossPutFile = new PutFile($file, $dir);
            $result = $ossPutFile->exec();
            if ($result === false) throw new Exception('文件上传失败');

            return apiResponse(ApiConstant::SUCCESS, ApiConstant::SUCCESS_MSG, ['url' => $result]);
        } catch (Exception $exception) {
            return apiResponse(ApiConstant::FAILED, ApiConstant::FAILED_MSG);
        }
    }
}