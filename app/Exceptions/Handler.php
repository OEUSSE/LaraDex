<?php

namespace LaraDex\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
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
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {        
        //if ($exception instanceof \LaraDex\Exceptions\CustomException) {
            //return $exception->render($request);
        //}

        return parent::render($request, $exception);

        /* if ($e instanceof \Illuminate\Session\TokenMismatchException){
            return redirect('/')->with('error',"Oops! Parece que te demoraste mucho tiempo para hacer una acción, vuelve a intentarlo!");
        } */
        // if ($e->getStatusCode() == 403) {
        //     $error = '';
        //     if (strpos($e->getMessage(), 'role')) {
        //         $error = Lang::get('messages.error_role');
        //     }else{
        //         $error = Lang::get('messages.error_permission');
        //     }
        //     alert()->error(Lang::get('emails.Whoops'),$error);
        //     if (!empty(url()->previous())) {
        //         return  redirect()->back();
        //     }
        //     return  redirect()->to('home');
        // }

        //return parent::render($request, $exception);
    }
}
