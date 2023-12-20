<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    //     /**
    //      * Register the exception handling callbacks for the application.
    //      */
    //     public function register(): void
    //     {
    //         $this->reportable(function (Throwable $e) {
    //             //
    //         });
    //     }
    // }

    /**
     * Report or log an exception.
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ModelNotFoundException) {
            return  Response::json([
                'error' => [
                    'message' => 'Not Found!'
                ]
            ], 404);
        }
        if ($exception instanceof MethodNotAllowedHttpException) {
            return  Response::json([
                'error' => [
                    'message' => 'Not Supported for this route!'
                ]
            ], 404);
        }
        /*else{
            return  Response::json([
                'error' => [
                    'message' => 'Not Supported!'
                ]
            ], 404);
         }*/
        return parent::render($request, $exception);
    }
}
