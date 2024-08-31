<?php

namespace App\Repositories;

use Illuminate\Validation\ValidationException;
use Validator;
use Yajra\Datatables\Datatables;
use DB;

use \App\Models\dw\Dw_m_admin_department;

class DwAdminDepartment
{
	private $adminDepartment;

	public function __construct(Dw_m_admin_department $adminDepartment)
	{
		$this->adminDepartment = $adminDepartment;
	}

    public static function getAll()
    {
        return Dw_m_admin_department::all();
    }

	public static function tableAdminDepartment($request)
    {
        $userLogin = \Auth::user();
        DB::statement(DB::raw('set @rownum=0'));
        $adminDepartments = Dw_m_admin_department::select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'm_admin_departments.id',
            'm_admin_departments.department_id',
            'm_admin_departments.user_id',
            'm_departments.nama as department_nama',
            'users.name as user_name',
            'users.email as user_email',
        ])
        ->join('m_departments', 'm_admin_departments.department_id', '=', 'm_departments.id')
        ->join('users', 'm_admin_departments.user_id', '=', 'users.id')
        ;

        // filter
        if ($request->department_id!='') {
            $adminDepartments = $adminDepartments->where('m_admin_departments.department_id', $request->department_id);
        }
        if ($request->user_name!='') {
            $adminDepartments = $adminDepartments->where('users.name', 'like', '%'.$request->user_name.'%');
        }

        $datatables = Datatables::of($adminDepartments)
            ->addColumn('aksi', function ($d) use($userLogin) {
                $aksi_edit = '';
                $aksi_delete = '';
                $aksi_delete = '<a href="#" title="delete" onclick="event.preventDefault(); btn_delete('.$d->id.')" style="color: #000;"><i class="fa fa-times"></i></a>';

                return $aksi_delete;
            })
            ->escapeColumns([])
        ;

        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }

        return $datatables->make(true);
    }

    public function save($departmentId, $userId)
    {
    	$fields = array(
            'department_id' => $departmentId,
            'user_id' => $userId,
        );
        $rules = array(
            'department_id' => 'required',
            'user_id' => 'required',
        );
        $messages = array(
            'department_id.required' => 'Department tidak boleh kosong',
            'user_id.required' => 'User Admin tidak boleh kosong',
        );
        $validator = Validator::make($fields, $rules, $messages);
        // Validate the input and return correct response
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $cek = Dw_m_admin_department::where('user_id', $userId)->first();
        if ($cek) {
        	throw new \Exception("Duplicate User Admin");
        }

        $this->adminDepartment->department_id = $departmentId;
        $this->adminDepartment->user_id = $userId;
        $this->adminDepartment->save();

        return $this->adminDepartment;
    }
}