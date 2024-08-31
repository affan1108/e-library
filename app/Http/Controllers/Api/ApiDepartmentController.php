<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Repositories
use App\Repositories\JsonResponse;
use App\Repositories\Jabatan;

class ApiDepartmentController extends Controller
{
    public function getUsers($departmentId)
    {
    	$jsonResponse = new JsonResponse();
    	try {
	    	$users = \App\User::where('department_id', $departmentId)
	    		->where('jabatan_id', '!=', Jabatan::ADMIN_JABATAN_ID)
	    		->get();

    		$jsonResponse->setSuccess(true);
            $jsonResponse->setData($users);
            $jsonResponse->setMessage('Berhasil.');
            return response()->json($jsonResponse->getResponse());
    	} catch (\Exception $e) {
    		$jsonResponse->setMessage($e->getMessage());
            return response()->json($jsonResponse->getResponse(), 400);
    	}
    }
}
