<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

use Illuminate\Database\QueryException;
use Illuminate\Http\Response;

use App\M_department;

// Repositories
use App\Repositories\JsonResponse;
use App\Repositories\Department;

class DepartmentController extends Controller
{
    private $department;

    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }
    public function index()
    {
        return view('backend.department.index');
    }

    /**
     * list department data using datatable
     * @param  Request $request
     * @return Datatable
     */
    public function ajax_list(Request $request)
    {
        return Department::tableDepartment($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mode = 'create';
        $method = 'POST';
        $action = route('department.store');
        return view('backend.department.form', compact('mode','method','action'));
    }

    public function store(Request $request)
    {
        $jsonResponse = new JsonResponse();
        try {
            $this->department = new Department(new \App\M_department);
            $department = $this->department->store($request->nama, $request->ket);

            $jsonResponse->setSuccess(true);
            $jsonResponse->setMessage('Department berhasil ditambahkan.');
            $jsonResponse->setNextUrl(route('department.index'));
            return response()->json($jsonResponse->getResponse());
        } catch(ValidationException $e) {
            $errors = $e->validator->getMessageBag()->toArray();
            $jsonResponse->setErrors($errors);
            $jsonResponse->setMessage('Terjadi kesalahan.');
            return response()->json($jsonResponse->getResponse(), 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mode = 'edit';
        $method = 'PUT';
        $action = route('department.update', $id);
        $dt = M_department::find($id);
        if (!$dt )
        {
            return redirect('/department')
                   ->with('alert-class', 'alert-danger')
                   ->with('message', 'Data tidak ditemukan.');
        }
        return view('backend.department.form', compact('mode','method','action','dt'));
    }

    public function update(Request $request, $id)
    {
        $dt = \App\M_department::find($id);
        if (!$dt) {
            return redirect(route('department.index'))
                   ->with('alert-class', 'alert-danger')
                   ->with('message', 'Data tidak ditemukan.');
        }

        $jsonResponse = new JsonResponse();
        try {
            $this->department = new Department($dt);
            $department = $this->department->update($request->nama, $request->ket);
            
            $jsonResponse->setSuccess(true);
            $jsonResponse->setMessage('Department berhasil diperbarui.');
            $jsonResponse->setNextUrl(route('department.index'));
            return response()->json($jsonResponse->getResponse());
        } catch(ValidationException $e) {
            $errors = $e->validator->getMessageBag()->toArray();
            $jsonResponse->setErrors($errors);
            $jsonResponse->setMessage('Terjadi kesalahan.');
            return response()->json($jsonResponse->getResponse(), 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $data = array('active'=>0);
            $department = M_department::findorfail($id);
            $dms_department = \App\Models\dms\Dms_m_department::find($id);
            $library_department = \App\Models\library\Library_m_department::find($id);

            if ($department->users()->where('active', 1)->get()->count() > 0) {
                $result['stat'] = false;
                $result['message'] = 'Department tersebut berkaitan dengan data user.';
            } else {
                $department->update($data);
                if ($dms_department) {
                    $dms_department->update($data);
                }
                if ($library_department) {
                    $library_department->update($data);
                }
                $result['stat'] = true;
                $result['message'] = 'Department berhasil dihapus.';
            }
        } catch (QueryException $e) {
            dd($e);
            $result['stat'] = false;
            $result['message'] = 'Tidak bisa.';
        }
        return response()->json($result);
    }
}
