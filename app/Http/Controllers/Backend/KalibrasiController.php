<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

use App\Repositories\JsonResponse;
use App\Repositories\Kalibrasi;

class KalibrasiController extends Controller
{
    public function userLevel()
    {
    	$data['departments'] = \App\Models\kalibrasi\Kalibrasi_m_department::all();
    	$data['jabatans'] = \App\Models\kalibrasi\Kalibrasi_m_jabatan::all();
    	$data['levels'] = \App\Models\kalibrasi\Kalibrasi_m_level::all();
    	return view('backend.kalibrasi.user-level.index', $data);
    }

    public function ajaxListUserLevel(Request $request)
    {
    	return Kalibrasi::tableUserLevel($request);
    }

    public function createUserLevel()
    {
    	$data['mode'] = 'create';
    	$data['method'] = 'POST';
    	$data['action'] = route('kalibrasi.storeUserLevel');
    	$data['users'] = Kalibrasi::getUser();
    	$data['levels'] = Kalibrasi::getLevels();
    	return view('backend.kalibrasi.user-level.form', $data);
    }

    public function storeUserLevel(Request $request)
    {
    	$jsonResponse = new JsonResponse();
        try {
            $userId = $request->user_id; 
            $levelId = $request->level_id; 
            $user = new Kalibrasi(new \App\Models\kalibrasi\Kalibrasi_user);
            $userLevel = $user->update($userId, $levelId);

            $jsonResponse->setSuccess(true);
            $jsonResponse->setMessage('User Level berhasil ditambahkan.');
            $jsonResponse->setNextUrl(route('kalibrasi.userLevel'));
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
    	$user = \App\Models\kalibrasi\Kalibrasi_user::find($id);
    	if (!$user) {
    		return redirect(route('kalibrasi.userLevel'))
    			->with('alert-class', 'alert-danger')
                ->with('message', 'Data tidak ditemukan.');
    	}

    	$data['mode'] = 'edit';
    	$data['method'] = 'PUT';
    	$data['action'] = route('kalibrasi.updateUserLevel', $id);
    	$data['user'] = Kalibrasi::getUser($id);
    	$data['levels'] = Kalibrasi::getLevels();
    	return view('backend.kalibrasi.user-level.form', $data);
    }

    public function updateUserLevel(Request $request, $id)
    {
    	$jsonResponse = new JsonResponse();
        try {
            $userId = $id; 
            $levelId = $request->level_id; 
            $user = new Kalibrasi(new \App\Models\kalibrasi\Kalibrasi_user);
            $userLevel = $user->update($userId, $levelId);

            $jsonResponse->setSuccess(true);
            $jsonResponse->setMessage('User Level berhasil diperbarui.');
            $jsonResponse->setNextUrl(route('kalibrasi.userLevel'));
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
            $user = new Kalibrasi(\App\Models\kalibrasi\Kalibrasi_user::find($id));
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
