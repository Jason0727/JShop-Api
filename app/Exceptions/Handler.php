<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param \Throwable $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Throwable $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        // ↓↓↓↓↓ 重构Symfony异常 ↓↓↓↓↓
        if ($exception instanceof BadRequestHttpException) {
            return response()->json([
                "code" => 400,
                "msg" => $exception->getMessage()
            ]);
        }

        if ($exception instanceof UnauthorizedHttpException) {
            return response()->json([
                "code" => 401,
                "msg" => $exception->getMessage() ?: "认证失败，请稍后再试~"
            ]);
        }

        if ($exception instanceof AccessDeniedHttpException) {
            return response()->json([
                "code" => 403,
                "msg" => "拒绝访问，请稍后再试~"
            ]);
        }

        if ($exception instanceof NotFoundHttpException) {
            return response()->json([
                "code" => 404,
                "msg" => "哎呀，跑丢了~"
            ]);
        }

        if ($exception instanceof MethodNotAllowedHttpException) {
            return response()->json([
                "code" => 405,
                "msg" => "臣妾给不了您的请求~"
            ]);
        }

        if ($exception instanceof PlatformNotAcceptableHttpException) {
            return response()->json([
                "code" => 406,
                "msg" => "平台跑丢了~"
            ]);
        }

        if ($exception instanceof TooManyRequestsHttpException) {
            return response()->json([
                "code" => 429,
                "msg" => "您稍微歇会~"
            ]);
        }
        // ↑↑↑↑↑ 重构Symfony异常 ↑↑↑↑↑

        return parent::render($request, $exception);
    }
}
