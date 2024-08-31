<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

use App\Repositories\JsonResponse;
use App\Repositories\Stability;

class StabilityController extends Controller
{
    public function userLevel()
    {
    	$data['departments'] = \App\Models\stability\Stability_m_department::all();
    	$data['jabatans'] = \App\Models\stability\Stability_m_jabatan::all();
    	$data['levels'] = \App\Models\stability\Stability_m_level::all();
    	return view('backend.stability.user-level.index', $data);
    }

    public function ajaxListUserLevel(Request $request)
    {
    	return Stability::tableUserLevel($request);
    }

    public function createUserLevel()
    {
    	$data['mode'] = 'create';
    	$data['method'] = 'POST';
    	$data['action'] = route('stability.storeUserLevel');
    	$data['users'] = Stability::getUser();
    	$data['levels'] = Stability::getLevels();
    	return view('backend.stability.user-level.form', $data);
    }

    public function storeUserLevel(Request $request)
    {
    	$jsonResponse = new JsonResponse();
        try {
            $userId = $request->user_id; 
            $levelId = $request->level_id; 
            $user = new Stability(new \App\Models\stability\Stability_user);
            $userLevel = $user->update($userId, $levelId);

            $jsonResponse->setSuccess(true);
            $jsonResponse->setMessage('User Level berhasil ditambahkan.');
            $jsonResponse->setNextUrl(route('stability.userLevel'));
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

    public function editUserLevel($id)
    {
    	$user = \App\Models\stability\Stability_user::find($id);
    	if (!$user) {
    		return redirect(route('stability.userLevel'))
    			->with('alert-class', 'alert-danger')
                ->with('message', 'Data tidak ditemukan.');
    	}

    	$data['mode'] = 'edit';
    	$data['method'] = 'PUT';
    	$data['action'] = route('stability.updateUserLevel', $id);
    	$data['user'] = Stability::getUser($id);
    	$data['levels'] = Stability::getLevels();
    	return view('backend.stability.user-level.form', $data);
    }

    public function updateUserLevel(Request $request, $id)
    {
    	$jsonResponse = new JsonResponse();
        try {
            $userId = $id; 
            $levelId = $request->level_id; 
            $user = new Stability(new \App\Models\stability\Stability_user);
            $userLevel = $user->update($userId, $levelId);

            $jsonResponse->setSuccess(true);
            $jsonResponse->setMessage('User Level berhasil diperbarui.');
            $jsonResponse->setNextUrl(route('stability.userLevel'));
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

    public function destroyUserLevel($id)
    {
    	$jsonResponse = new JsonResponse();
        try {
            $userId = $id; 
            $user = new Stability(\App\Models\stability\Stability_user::find($id));
            $userLevel = $user->delete();

            $jsonResponse->setSuccess(true);
            $jsonResponse->setMessage('User Level berhasil dihapus.');
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
}
