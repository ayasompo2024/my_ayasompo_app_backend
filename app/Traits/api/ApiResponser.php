<?php

namespace App\Traits\api;


trait ApiResponser
{
	protected function errorResponse($message = "Fail", $status_code = null)
	{
		return response()->json([
			'isSuccess' => false,
			'message' => $message,
			'statusCode' => $status_code,
		], $status_code);
	}
	protected function respondValidationErrors($message = "Fai", $data, $status_code = 400)
	{
		return response()->json([
			'isSuccess' => false,
			'message' => $message,
			'errors' => $data,
			'statusCode' => $status_code,
		], $status_code);
	}

	protected function successResponse($message = "Success", $data, $status_code = 201)
	{
		return response()->json([
			'isSuccess' => true,
			'message' => $message,
			'data' => $data,
			'statusCode' => $status_code,
		], $status_code);
	}

	protected function respondUnAuthorized($message = 'Unauthorized')
	{
		return response()->json([
			'isSuccess' => false,
			'message' => $message,
			'statusCode' => 401
		], 401);
	}


// protected function respondNoContent($message = 'No Content Found')
// {

// }



// protected function respondForbidden($message = 'Forbidden')
// {
// 	// return $this->respondError($message, 403);
// }

// protected function respondNotFound($message = 'Not Found')
// {
// 	// return $this->respondError($message, 404);
// }

// protected function respondInternalError($message = 'Internal Error')
// {
// 	// return $this->respondError($message, 500);
// }


}