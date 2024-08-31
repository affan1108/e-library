<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Http\Response;
use Validator;

use App\Models\dw\Dw_m_department;

class SignatureAdminDepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(['admin']);
    }

    public function index()
    {
        return view('backend.signature_admin_department.index');
    }

    public function ajax_list(Request $request)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $departments = Dw_m_department::select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'm_departments.id',
            'm_departments.nama',
            'm_departments.area_kerja_id',
            'm_area_kerjas.nama as area_kerja_nama',
            'm_departments.admin_user_id',
            'users.name as admin_user_name',
            'm_jabatans.nama as jabatan_nama',
        ])
        ->leftJoin('m_area_kerjas', 'm_departments.area_kerja_id', '=', 'm_area_kerjas.id')
        ->leftJoin('users', 'm_departments.admin_user_id', '=', 'users.id')
        ->leftJoin('m_jabatans', 'users.jabatan_id', '=', 'm_jabatans.id')
        ->where('m_departments.active', 1)
        ;

        if ($request->area_kerja_id!='') {
            $departments = $departments->where('m_departments.area_kerja_id', $request->area_kerja_id);
        }
        if ($request->nama!='') {
            $departments = $departments->where('m_departments.nama', 'like', '%'.$request->nama.'%');
        }
        if ($request->admin_user_name!='') {
            $departments = $departments->where('users.name', 'like', '%'.$request->admin_user_name.'%');
        }
        if ($request->jabatan_nama!='') {
            $departments = $departments->where('m_jabatans.nama', 'like', '%'.$request->jabatan_nama.'%');
        }

        $datatables = Datatables::of($departments)
            ->addColumn('aksi', function ($r) {
                $aksi_edit = '';
                $aksi_delete = '';
                $aksi_edit = '<a href="'.route('signature_admin_department.edit', $r->id).'" title="edit" style="color: #000;"><i class="fa fa-pencil"></i></a>';

                return $aksi_edit;
            })
            ->escapeColumns([])
        ;

        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }

        return $datatables->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function edit($id)
    {
        $mode = 'edit';
        $method = 'PUT';
        $action = route('signature_admin_department.update', $id);
        $dt = Dw_m_department::find($id);

        if (!$dt )
        {
            return redirect('/signature_admin_department')
                   ->with('alert-class', 'alert-danger')
                   ->with('message', 'Data tidak ditemukan.');
        }
        return view('backend.signature_admin_department.form', compact('mode','method','action','dt'));
    }

    public function handleRequest($request, $id='')
    {
        $result['success'] = true;
        $rules = array(
            'admin_user_id' => 'required',
        );
        $messages = array(
            'admin_user_id.required' => 'Admin Department tidak boleh kosong',
        );
        $validator = Validator::make($request->all(), $rules, $messages);

        // Validate the input and return correct response
        if ($validator->fails()) {
            $result['success'] = false;
            $result['errors'] = $validator->getMessageBag()->toArray();
            return $result;

        }
        return $result;
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $validate = $this->handleRequest($request, $id);
        if (!$validate['success']) {
            return response()->json(array(
                'success' => false,
                'errors' => $validate['errors'],
            ), 400); // 400 being the HTTP code for an invalid request.
        }

        try {
            // signature
            $signature_department = Dw_m_department::find($id);
            $signature_department->update($request->all());

            $result['success'] = true;
            $result['url'] = '/signature_admin_department';
            $result['message'] = 'Admin Department berhasil diperbarui!';
        } catch (QueryException $e) {
            dd($e);
            $result['success'] = false;
            $result['message'] = 'Gagal disimpan.';
        }
        return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
