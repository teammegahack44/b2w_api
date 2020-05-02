<?php

namespace App\Http\Controllers\Traits;

use App\Utils\ResponseUtil;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Response as ResponseCode;

trait ApiResponse
{
    /**
     * @param  $result
     * @param string $message
     * @param int $code
     * @return JsonResponse
     */
    public function sendResponse($result, string $message = 'DONE', int $code = ResponseCode::HTTP_OK)
    {
        return \Response::json(ResponseUtil::makeResponse($message, $result), $code);
    }

    /**
     * @param string $error
     * @param int $code
     * @return JsonResponse
     */
    public function sendError($error, int $code = ResponseCode::HTTP_NOT_FOUND)
    {
        return \Response::json(ResponseUtil::makeError($error), $code);
    }

}
