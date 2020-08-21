<?php

namespace App\Http\Controllers\FissionRedPackage;

use App\Http\Controllers\Controller;
use App\Http\Requests\FissionRedPackage\DetailRequest;
use App\Models\FissionRedPackageRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class DetailController extends Controller
{
    public function __invoke(DetailRequest $detailRequest)
    {
        # 验证数据
        $validatedData = $detailRequest->validated();

        # 校验红包
        $fissionRedPackageRecord = FissionRedPackageRecord::query()->where([
            ['id', '=', $validatedData['red_id']],
            ['parent_id', '=', 0], # 主包
            ['user_id', '=', $this->userId()]
        ])->first();
        if (!$fissionRedPackageRecord) throw new BadRequestHttpException('红包跑丢了~');



        dd($fissionRedPackageRecord);
    }
}
