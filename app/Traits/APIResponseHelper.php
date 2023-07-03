<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait APIResponseHelper
{
    /**
     * success response method.
     *
     * @param $result
     * @param null $message
     * @param int $code
     * @return JsonResponse
     */
    public function successResponse($result, $message = null, $code = 200): JsonResponse
    {
        $response ['success'] = true;

        if (!is_null($result)) {
            $response['data'] = $result;
        }

        if ($message) {
            $response['message'] = $message;
        }

        return response()->json($response,$code);
    }


    /**
     * return error response.
     *
     * @param $error
     * @param array $errorMessages
     * @param int $code
     * @return JsonResponse
     */
    public function errorResponse($error, $errorMessages = [], $code = 404): JsonResponse
    {
        $response ['success'] = false;

        if (!is_null($error)) {
            $response['data'] = $error;
        }

        if ($errorMessages) {
            $response['message'] = $errorMessages;
        }


        return response()->json($response, $code);
    }
}
