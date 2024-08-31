<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

// Repositories
use App\Repositories\JsonResponse;
use App\Repositories\UserRight;
use App\Repositories\User;

class UserRightController extends Controller
{
    private $userRight;

    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }
    public function index()
    {
        return view('backend.user-right.index');
    }

    /**
     * list user data using datatable
     * @param  Request $request
     * @return Datatable
     */
    public function ajaxList(Request $request)
    {
        return UserRight::tableUserRight($request);
    }

    public function create()
    {
        $data['mode'] = 'create';
        $data['method'] = 'POST';
        $data['action'] = route('userRight.store');
        $data['users'] = \App\User::where('active', 1)->get();
        $data['apps'] = \App\App::where('id', '!=', UserRight::PORTAL_APP_ID)->get();
        return view('backend.user-right.form', $data);
    }

    public function store(Request $request)
    {
        $jsonResponse = new JsonResponse();
        try {
            $this->userRight = new UserRight(new \App\UserRight);
            $userId = $request->user_id; 
            $appId = $request->app_id; 
            $userRight = $this->userRight->store($userId, $appId);

            $jsonResponse->setSuccess(true);
            $jsonResponse->setMessage('User Right berhasil ditambahkan.');
            $jsonResponse->setNextUrl(route('userRight.index'));
            return response()->json($jsonResponse->getResponse());
        } catch(ValidationException $e) {
            $errors = $e->validator->getMessageBag()->toArray();
            $jsonResponse->setErrors($errors);
            $jsonResponse->setMessage('Terjadi kesalahan.');
            return response()->json($jsonResponse->getResponse(), 400);
        } catch(\Exception $e) {
        	$jsonResponse->setMessage($e->getMessage());
            return response()->json($jsonResponse->getResponse());
        }
    }

    public function destroy($id)
    {
    	$jsonResponse = new JsonResponse();
        try {
	    	$userRight = \App\UserRight::find($id);
	    	if (!$userRight) {
	    		throw new \Exception("Data tidak ditemukan");
	    	}
	    	$this->userRight = new UserRight($userRight);
            $delete = $this->userRight->destroy();

            $jsonResponse->setSuccess(true);
            $jsonResponse->setMessage('User Right berhasil dihapus.');
            return response()->json($jsonResponse->getResponse());
        } catch(\Exception $e) {
        	$jsonResponse->setMessage($e->getMessage());
            return response()->json($jsonResponse->getResponse());
        }
    }
}
