<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Validator;
use Illuminate\Http\Response;

// Repositories
use App\Repositories\JsonResponse;
use App\Repositories\UserDc;

// Models
use App\Models\dms\Dms_user;

class UserDcController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }
    public function index()
    {
        return view('backend.user_dc.index');
    }

    public function ajax_list(Request $request)
    {
        return UserDc::tableUserDc($request);
    }

    public function create()
    {
        $data['mode'] = 'create';
        $data['method'] = 'POST';
        $data['action'] = route('user_dc.store');
        $data['users'] = UserDc::getNotDc();
        return view('backend.user_dc.form', $data);
    }

    public function store(Request $request)
    {
        $jsonResponse = new JsonResponse();
        try {
            $userId = $request->user_id;
            $fields = array(
                'user_id' => $userId,
            );
            $rules = array(
                'user_id' => 'required',
            );
            $messages = array(
                'user_id.required' => 'User tidak boleh kosong',
            );

            $validator = Validator::make($fields, $rules, $messages);
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $this->user = new UserDc(Dms_user::find($userId));
            $this->user->setDc();

            $jsonResponse->setSuccess(true);
            $jsonResponse->setMessage('User DC berhasil ditambahkan.');
            $jsonResponse->setNextUrl(route('user_dc.index'));
            return response()->json($jsonResponse->getResponse());
        } catch(ValidationException $e) {
            $errors = $e->validator->getMessageBag()->toArray();
            $jsonResponse->setErrors($errors);
            $jsonResponse->setMessage('Terjadi kesalahan.');
            return response()->json($jsonResponse->getResponse(), 400);
        }
    }

    public function show($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jsonResponse = new JsonResponse();
        try {
            $this->user = new UserDc(Dms_user::find($id));
            $this->user->unsetDc();

            $jsonResponse->setSuccess(true);
            $jsonResponse->setMessage('User DC berhasil dihapus.');
            return response()->json($jsonResponse->getResponse());
        } catch(ValidationException $e) {
            $errors = $e->validator->getMessageBag()->toArray();
            $jsonResponse->setErrors($errors);
            $jsonResponse->setMessage('Terjadi kesalahan.');
            return response()->json($jsonResponse->getResponse(), 400);
        }
    }
     public function userLevel()
    {
        $data['departments'] = \App\Models\dms\Dms_m_department::all();
        $data['jabatans'] = \App\Models\dms\Dms_m_jabatan::all();
        $data['levels'] = \App\Models\dms\Dms_m_level::all();
        return view('backend.dms.user-level.index', $data);
    }
    public function ajaxListUserLevel(Request $request)
    {
        return UserDc::tableUserLevel($request);
    }

    public function createUserLevel()
    {
        $data['mode'] = 'create';
        $data['method'] = 'POST';
        $data['action'] = route('dms.storeUserLevel');
        $data['users'] = UserDc::getUser();
        $data['levels'] = UserDc::getLevels();
        return view('backend.dms.user-level.form', $data);
    }

    public function storeUserLevel(Request $request)
    {
        $jsonResponse = new JsonResponse();
        try {
            $userId = $request->user_id; 
            $levelId = $request->level_id; 
            $user = new UserDc(new \App\Models\dms\Dms_user);
            $userLevel = $user->update($userId, $levelId);

            $jsonResponse->setSuccess(true);
            $jsonResponse->setMessage('User Level berhasil ditambahkan.');
            $jsonResponse->setNextUrl(route('dms.userLevel'));
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
        $user = \App\Models\dms\Dms_user::find($id);
        if (!$user) {
            return redirect(route('dms.userLevel'))
                ->with('alert-class', 'alert-danger')
                ->with('message', 'Data tidak ditemukan.');
        }

        $data['mode'] = 'edit';
        $data['method'] = 'PUT';
        $data['action'] = route('dms.updateUserLevel', $id);
        $data['user'] = UserDc::getUser($id);
        $data['levels'] = UserDc::getLevels();
        return view('backend.dms.user-level.form', $data);
    }

    public function updateUserLevel(Request $request, $id)
    {
        $jsonResponse = new JsonResponse();
        try {
            $userId = $id; 
            $levelId = $request->level_id; 
            $user = new UserDc(new \App\Models\dms\Dms_user);
            $userLevel = $user->update($userId, $levelId);

            $jsonResponse->setSuccess(true);
            $jsonResponse->setMessage('User Level berhasil diperbarui.');
            $jsonResponse->setNextUrl(route('dms.userLevel'));
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
            $user = new UserDc(\App\Models\dms\Dms_user::find($id));
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
