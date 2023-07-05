<?php

namespace App\Exceptions;

use Throwable;
use Psy\Exception\FatalErrorException;
use Illuminate\Support\Facades\Request;
use Symfony\Component\ErrorHandler\Error\FatalError;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($this->isHttpException($exception)) {
            if ($exception->getStatusCode() == 404 ) {
                view()->share('is405Page', true);
                return response()->view('errors.404', [], 404);
            }
        }
        if ($exception instanceof ModelNotFoundException || $exception instanceof MethodNotAllowedHttpException) {
            if (!Request::is('admin/*')){
                return abort('404');
            }else if (!Request::is('dash/*')){
                return abort('405');
            }else if (!Request::is('/*')){
                return abort('406');
            }
        }

        return parent::render($request, $exception);
    }
}
