<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

use Illuminate\Database\QueryException;
use Illuminate\Http\Response;

// Repositories
use App\Repositories\JsonResponse;
use App\Repositories\User;
use App\Repositories\Department;
use App\Repositories\Jabatan;

class UserController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }
    public function index()
    {
        return view('backend.user.index');
    }

    /**
     * list user data using datatable
     * @param  Request $request
     * @return Datatable
     */
    public function ajax_list(Request $request)
    {
        return User::tableUser($request);
    }

    public function form_department($id, $area_kerja_id)
    {
        if ($id != 0) {
            $dt = \App\User::find($id);
            return view('backend.user.form_department', compact('dt','area_kerja_id'));
        } else {
            return view('backend.user.form_department', compact('area_kerja_id'));
        }
    }

    public function create()
    {
        $data['mode'] = 'create';
        $data['method'] = 'POST';
        $data['action'] = route('user.store');
        $data['departments'] = Department::getAll();
        $data['jabatans'] = Jabatan::getAll();
        return view('backend.user.form', $data);
    }

    public function store(Request $request)
    {
        $jsonResponse = new JsonResponse();
        try {
            $this->user = new User(new \App\User);
            $name = $request->name; 
            $email = $request->email; 
            $password = $request->password;
            $departmentId = $request->department_id; 
            $jabatanId = $request->jabatan_id;
            $user = $this->user->register($name, $email, $password, $departmentId, $jabatanId);

            $jsonResponse->setSuccess(true);
            $jsonResponse->setMessage('User berhasil ditambahkan.');
            $jsonResponse->setNextUrl(route('user.index'));
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

    public function edit($id)
    {
        $dt = \App\User::find($id);
        if (!$dt) {
            return redirect('/user')
                   ->with('alert-class', 'alert-danger')
                   ->with('message', 'Data tidak ditemukan.');
        }

        $data['dt'] = $dt;
        $data['mode'] = 'edit';
        $data['method'] = 'PUT';
        $data['action'] = route('user.update', $id);
        $data['departments'] = Department::getAll();
        $data['jabatans'] = Jabatan::getAll();
        
        return view('backend.user.form', $data);
    }

    public function update(Request $request, $id)
    {
        $dt = \App\User::find($id);
        if (!$dt) {
            return redirect(route('user.index'))
                   ->with('alert-class', 'alert-danger')
                   ->with('message', 'Data tidak ditemukan.');
        }

        $jsonResponse = new JsonResponse();
        try {
            $this->user = new User($dt);
            $name = $request->name; 
            $email = $request->email; 
            $password = $request->password;
            $departmentId = $request->department_id; 
            $jabatanId = $request->jabatan_id;
            $user = $this->user->update($name, $email, $password, $departmentId, $jabatanId);

            $jsonResponse->setSuccess(true);
            $jsonResponse->setMessage('User berhasil diperbarui.');
            $jsonResponse->setNextUrl(route('user.index'));
            return response()->json($jsonResponse->getResponse());
        } catch(ValidationException $e) {
            $errors = $e->validator->getMessageBag()->toArray();
            $jsonResponse->setErrors($errors);
            $jsonResponse->setMessage('Terjadi kesalahan.');
            return response()->json($jsonResponse->getResponse(), 400);
        }

    }

    public function destroy($id)
    {
      try {
          $data = array('active'=>0);
          $user = \App\User::findorfail($id);
          $dms_user = \App\Models\dms\Dms_user::find($id);
          $library_user = \App\Models\library\Library_user::find($id);
          $kalibrasi_user = \App\Models\kalibrasi\Kalibrasi_user::find($id);
          $reagensia_user = \App\Models\reagensia\Reagensia_user::find($id);
          $stability_user = \App\Models\stability\Stability_user::find($id);

          $ok = true;
          // dms
          if ($user) {
              $user->update($data);
          }
          if ($dms_user) {
              $dms_user->update($data);
          }
          if ($library_user) {
              $library_user->update($data);
          }
          if ($kalibrasi_user) {
              $kalibrasi_user->update($data);
          }
          if ($reagensia_user) {
              $reagensia_user->update($data);
          }
          if ($stability_user) {
              $stability_user->update($data);
          }
          $result['stat'] = true;
          $result['message'] = 'User berhasil dihapus.';
      } catch (QueryException $e) {
          dd($e);
          $result['stat'] = false;
          $result['message'] = 'Tidak bisa.';
      }
      return response()->json($result);
    }
}
