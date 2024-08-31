<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

use App\Repositories\JsonResponse;
use App\Repositories\Reagensia;

class ReagensiaController extends Controller
{
    public function userLevel()
    {
    	$data['departments'] = \App\Models\reagensia\Reagensia_m_department::all();
    	$data['jabatans'] = \App\Models\reagensia\Reagensia_m_jabatan::all();
    	$data['levels'] = \App\Models\reagensia\Reagensia_m_level::all();
    	return view('backend.reagensia.user-level.index', $data);
    }

    public function ajaxListUserLevel(Request $request)
    {
    	return Reagensia::tableUserLevel($request);
    }

    public function createUserLevel()
    {
    	$data['mode'] = 'create';
    	$data['method'] = 'POST';
    	$data['action'] = route('reagensia.storeUserLevel');
    	$data['users'] = Reagensia::getUser();
    	$data['levels'] = Reagensia::getLevels();
    	return view('backend.reagensia.user-level.form', $data);
    }

    public function storeUserLevel(Request $request)
    {
    	$jsonResponse = new JsonResponse();
        try {
            $userId = $request->user_id; 
            $levelId = $request->level_id; 
            $user = new Reagensia(new \App\Models\reagensia\Reagensia_user);
            $userLevel = $user->update($userId, $levelId);

            $jsonResponse->setSuccess(true);
            $jsonResponse->setMessage('User Level berhasil ditambahkan.');
            $jsonResponse->setNextUrl(route('reagensia.userLevel'));
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
    	$user = \App\Models\reagensia\Reagensia_user::find($id);
    	if (!$user) {
    		return redirect(route('reagensia.userLevel'))
    			->with('alert-class', 'alert-danger')
                ->with('message', 'Data tidak ditemukan.');
    	}

    	$data['mode'] = 'edit';
    	$data['method'] = 'PUT';
    	$data['action'] = route('reagensia.updateUserLevel', $id);
    	$data['user'] = Reagensia::getUser($id);
    	$data['levels'] = Reagensia::getLevels();
    	return view('backend.reagensia.user-level.form', $data);
    }

    public function updateUserLevel(Request $request, $id)
    {
    	$jsonResponse = new JsonResponse();
        try {
            $userId = $id; 
            $levelId = $request->level_id; 
            $user = new Reagensia(new \App\Models\reagensia\Reagensia_user);
            $userLevel = $user->update($userId, $levelId);

            $jsonResponse->setSuccess(true);
            $jsonResponse->setMessage('User Level berhasil diperbarui.');
            $jsonResponse->setNextUrl(route('reagensia.userLevel'));
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
            $user = new Reagensia(\App\Models\reagensia\Reagensia_user::find($id));
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
