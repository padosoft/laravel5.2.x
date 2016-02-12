<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
//use GrahamCampbell\Exceptions\ExceptionHandlerc as GrahamCampbellExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        if ($e instanceof \PHPUnit_Framework_Exception) {

            echo $e->getMessage();
            echo $e->getTraceAsString();
        }

        //$whoops = new \Whoops\Run;
        //$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        //$whoops->register();

        return parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if (config('app.debug') && app()->environment() != 'testing') {
            return $this->renderExceptionWithWhoops($request, $e);
        }

        return parent::render($request, $e);
    }

    /**
     * Render an exception using Whoops.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception $e
     * @return Response
     */
    protected function renderExceptionWithWhoops($request, Exception $e)
    {
        $whoops = new \Whoops\Run;

        if ($request->ajax()) {
            $whoops->pushHandler(new \Whoops\Handler\JsonResponseHandler());
        } else {
            $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
        }

        return new \Illuminate\Http\Response(
            $whoops->handleException($e),
            $e->getStatusCode(),
            $e->getHeaders()
        );
    }

    /*
         protected function renderExceptionWithWhoops($request, Exception $e)
    {
        $whoops = new \Whoops\Run;
        if ($request->ajax() || $request->wantsJson()) {
            $whoops->pushHandler(new \Whoops\Handler\JsonResponseHandler());
        } else {
            $handler = new \Whoops\Handler\PrettyPageHandler();
            //$handler->setEditor('phpstorm');
            $handler->setEditor(
                function ($file, $line) {
                    // if your development server is not local it's good to map remote files to local
                    $translations = array('^' . env('SERVER_HOME') => env('LOCAL_HOME')); // change to your path
                    foreach ($translations as $from => $to) {
                        $file = rawurlencode(preg_replace('#' . $from . '#', $to, $file, 1));
                    }
                    return array(
                        'url' => "phpstorm://open?file=$file&line=$line",
                        'ajax' => false
                    );
                }
            );
            $handler->addResourcePath(base_path('app/Exceptions'));
            $handler->addCustomCss('whoops.base.css');
            $whoops->pushHandler($handler);
        }

        return new \Illuminate\Http\Response(
            $whoops->handleException($e),
            $e->getStatusCode(),
            $e->getHeaders()
        );
    }
     */


}
