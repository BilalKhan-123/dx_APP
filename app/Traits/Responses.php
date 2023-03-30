<?php

namespace App\Traits;

use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Api Responser Trait
|--------------------------------------------------------------------------
|
| This trait will be used for any response we sent to clients.
|
*/

trait Responses
{
	
	protected function success($data, string $message = null, int $code = 200)
	{
		return response()->json([
			'status' => true,
			'message' => $message,
			'data' => $data
		], $code);
	}

	protected function error(string $message = null, int $code, $data = null)
	{
		return response()->json([
			'status' => false,
			'message' => $message,
			'data' => $data
		], $code);
	}

}