<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Handler extends ExceptionHandler {
	/**
	 * A list of the exception types that should not be reported.
	 *
	 * @var array
	 */
	protected $dontReport = [
		AuthorizationException::class,
		HttpException::class,
		ModelNotFoundException::class,
		TokenMismatchException::class,
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

	public function report(Exception $e) {
		if ($exception instanceof CustomException) {
			//
		}

		return parent::report($exception);
	}

	/**
	 * Render an exception into an HTTP response.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Exception  $e
	 * @return \Illuminate\Http\Response
	 */
	public function render($request, Exception $e) {

		if ($e instanceof CustomException) {
			return response()->view('errors.custom', [], 500);
		}

		if ($e instanceof HttpException) {
			return response()->json([
				'status' => 'error',
				'code' => 405,
				'msg' => 'Not a valid url',
			]);
		}
		return parent::render($request, $e);

	}
/*
public function render($request, Exception $e) {
if ($this->isHttpException($e)) {
switch ($e->getStatusCode()) {

// not authorized
case '403':
return \Response::view('errors.403', array(), 403);
break;

// not found
case '404':
return \Response::view('errors.404', array(), 404);
break;

// internal error
case '500':
return response()->json('{"error"}', 500);
break;

default:
return $this->renderHttpException($e);
break;
}
} else {
return parent::render($request, $e);
}
}*/
}
