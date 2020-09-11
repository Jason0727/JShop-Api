<?php

namespace App\Http\Controllers\FindRedPackage;

use App\Http\Controllers\Controller;
use App\Http\Requests\FindRedPackage\HelpRequest;
use App\Http\Services\FindRedPackageService;
use App\Models\FindRedPackageRecord;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class HelpController extends Controller
{
    // 好友助力帮拆红包
    public function __invoke(HelpRequest $helpRequest)
    {
        # 验证数据
        $validatedData = $helpRequest->validated();

        # 红包记录
        $findRedPackageRecord = FindRedPackageRecord::with(['user' => function ($query) {
            $query->select(['nickname', 'avatar_url']);
        }])->where([
            ['id', '=', $validatedData['red_id']],
            ['parent_id', '=', 0],
        ])->first();
        if (!$findRedPackageRecord) throw new BadRequestHttpException('哎呀，红包跑丢了~');

        # 校验活动是否关闭


        dd($findRedPackageRecord);
    }
}
