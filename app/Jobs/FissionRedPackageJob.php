<?php

namespace App\Jobs;

use App\Models\FissionRedPackageRecord;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Exception;

class FissionRedPackageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * 任务可尝试的次数
     *
     * @var int
     */
    public $tries = 5;

    /**
     * 重试任务前等待的秒数
     *
     * @var int
     */
    protected $retryAfter = 10;

    /**
     * @var FissionRedPackageRecord
     */
    protected $fissionRedPackageRecord;

    /**
     * FissionRedPackageJob constructor.
     * @param FissionRedPackageRecord $fissionRedPackageRecord
     */
    public function __construct(FissionRedPackageRecord $fissionRedPackageRecord)
    {
        $this->fissionRedPackageRecord = $fissionRedPackageRecord;

        $this->delay(Carbon::parse($this->fissionRedPackageRecord->expire_time));
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            Log::notice('Exec:' . Carbon::now()->toDateTimeString());

            throw new Exception('异常');
        } catch (Exception $exception) {
            Log::notice('Attempt:' . $this->attempts() . ',原因:' . $exception->getMessage());

            if ($this->attempts() < 3) {
                $this->release(); # 立即执行
            } elseif ($this->attempts() < $this->tries) {
                $this->release($this->retryAfter); # 延迟执行
            } else {
                $this->fail($exception); # 设置失败任务
            }
        }
    }

    /**
     * 任务未能处理
     * 说明: dispatchNow方法不会触发这个事件
     *
     * @param Exception $exception
     */
    public function failed(Exception $exception)
    {
        // 给用户发送失败通知, 等等...
        Log::error("彻底失败了");
    }
}
