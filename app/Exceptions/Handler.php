<?php

namespace App\Exceptions;

use App\Http\Controllers\Traits\ApiResponse;
use Dotenv\Exception\ValidationException;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use Prettus\Validator\Exceptions\ValidatorException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{

    use ApiResponse;


    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
        'senha',
        'confirmar_senha',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param Exception $e
     * @return void
     * @throws Exception
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param Request $request
     * @param Exception $e
     * @return JsonResponse|\Illuminate\Http\Response|Response
     */
    public function render($request, Exception $e)
    {

        if (env('APP_DEBUG')) {
            return parent::render($request, $e);
        }

        $status = Response::HTTP_INTERNAL_SERVER_ERROR;
        $message = null;

        if ($e instanceof HttpResponseException) {

            $status = Response::HTTP_INTERNAL_SERVER_ERROR;

        } elseif ($e instanceof MethodNotAllowedHttpException) {

            $status = Response::HTTP_METHOD_NOT_ALLOWED;
            $e = new MethodNotAllowedHttpException([], 'HTTP_METHOD_NOT_ALLOWED', $e);

        } elseif ($e instanceof NotFoundHttpException || $e instanceof ModelNotFoundException) {

            $status = Response::HTTP_NOT_FOUND;
            $e = new NotFoundHttpException('HTTP_NOT_FOUND', $e);

        } elseif ($e instanceof AuthorizationException) {

            $status = Response::HTTP_FORBIDDEN;
            $e = new AuthorizationException('HTTP_FORBIDDEN', $status);

        } elseif ($e instanceof ValidatorException) {

            $status = Response::HTTP_BAD_REQUEST;
            $message = $e->getMessageBag();

        } elseif ($e instanceof ValidationException && $e->getResponse()) {

            $status = Response::HTTP_BAD_REQUEST;
            $e = new ValidationException('HTTP_BAD_REQUEST', $status, $e);

        } elseif ($e instanceof AuthenticationException) {
            $status = Response::HTTP_UNAUTHORIZED;

        } elseif ($e) {
            $e = new HttpException($status, get_class($e) . ' - HTTP_INTERNAL_SERVER_ERROR');
        }

        if ($message === null) {
            $message = $e->getMessage();
        }


        return $this->sendError($message, $status);
    }
}
