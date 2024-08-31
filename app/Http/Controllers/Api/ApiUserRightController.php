<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Repositories
use App\Repositories\JsonResponse;
use App\Repositories\UserRight;
use App\Repositories\User;

class ApiUserRightController extends Controller
{
    public function checkRight(Request $request)
    {
    	$jsonResponse = new JsonResponse();
	    $webToken = $request->token;
	    $appId = $request->app_id;
    	try {
    		if (!$webToken || !$appId) {
    			throw new \Exception("Bad Request");
    		}

            $user = User::getByWebToken($webToken);
            if (!$user) {
                throw new \Exception("Invalid Token");
            }

	    	$response = UserRight::hasRight($user->id, $appId);

    		$jsonResponse->setSuccess(true);
            return response()->json($jsonResponse->getResponse());
    	} catch (\Exception $e) {
    		$jsonResponse->setMessage($e->getMessage());
            return response()->json($jsonResponse->getResponse());
    	}
    }
}
