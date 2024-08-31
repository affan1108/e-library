<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

// Repositories
use App\Repositories\JsonResponse;
use App\Repositories\DwAdminDepartment;

class DwAdminDepartmentController extends Controller
{
	private $adminDepartment;

    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    public function index()
    {
    	$data['departments'] = \App\M_department::all();
        return view('backend.dw-admin-department.index', $data);
    }

    public function ajax_list(Request $request)
    {
    	return DwAdminDepartment::tableAdminDepartment($request);
    }

    public function create()
    {
    	$data['departments'] = \App\M_department::all();
    	$data['method'] = 'POST';
    	$data['action'] = route('dw_admin_department.store');
        return view('backend.dw-admin-department.form', $data);
    }

    public function store(Request $request)
    {
        $jsonResponse = new JsonResponse();
        try {
            $this->adminDepartment = new DwAdminDepartment(new \App\Models\dw\Dw_m_admin_department);
            $adminDepartment = $this->adminDepartment->save($request->department_id, $request->user_id);
            
            $jsonResponse->setSuccess(true);
            $jsonResponse->setMessage('Admin Department berhasil ditambahkan.');
            $jsonResponse->setNextUrl(route('dw_admin_department'));
            return response()->json($jsonResponse->getResponse());
        } catch(ValidationException $e) {
            $errors = $e->validator->getMessageBag()->toArray();
            $jsonResponse->setErrors($errors);
            $jsonResponse->setMessage('Terjadi kesalahan.');
            return response()->json($jsonResponse->getResponse(), 400);
        } catch(\Exception $e) {
            $jsonResponse->setMessage($e->getMessage());
            return response()->json($jsonResponse->getResponse(), 400);
        }
    }

    public function destroy($id)
    {
        try {
            $adminDepartment = \App\Models\dw\Dw_m_admin_department::find($id);
            $adminDepartment->delete();
            $result['stat'] = true;
            $result['message'] = 'Admin Department berhasil dihapus.';
            
        } catch (QueryException $e) {
            dd($e);
            $result['stat'] = false;
            $result['message'] = 'Tidak bisa.';
        }
        return response()->json($result);
    }
}
