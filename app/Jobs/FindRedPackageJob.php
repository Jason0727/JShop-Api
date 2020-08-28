<?php

namespace App\Jobs;

use App\Models\FindRedPackageRecord;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Exception;

class FindRedPackageJob implements ShouldQueue
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
    public $retryAfter = 10;

    /**
     * @var FindRedPackageRecord
     */
    protected $findRedPackageRecord;

    /**
     * FindRedPackageJob constructor.
     * @param FindRedPackageRecord $findRedPackageRecord
     */
    public function __construct(FindRedPackageRecord $findRedPackageRecord)
    {
        $this->findRedPackageRecord = $findRedPackageRecord;

        $this->delay(Carbon::parse($this->findRedPackageRecord->expire_time));
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
