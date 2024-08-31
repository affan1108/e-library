<?php

namespace App\Repositories;

use Illuminate\Validation\ValidationException;
use Validator;
use Yajra\Datatables\Datatables;
use DB;
use File;
use Storage;
use Hash;

use JWTAuth;
// use Intervention\Image\ImageManagerStatic as Imageio;

class User
{
	private $user;

	public function __construct(\App\User $user)
	{
		$this->user = $user;
	}

    public static function loginWeb($request)
    {
        
    }

    public static function getByWebToken($webToken)
    {
        return \App\User::where('web_token', $webToken)->first();
    }

    public static function getActiveUsers()
    {
        return \App\User::where('active', 1)->get();
    }

	public static function tableUser($request)
	{
		DB::statement(DB::raw('set @rownum=0'));
        $users = \App\User::select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'users.id',
            'users.name',
            'users.email',
            'users.department_id',
            'users.jabatan_id',
            'm_departments.nama as department_nama',
            'm_area_kerjas.nama as area_kerja_nama',
            'm_jabatans.nama as jabatan_nama',
        ])
        ->leftJoin('m_departments', 'users.department_id', '=', 'm_departments.id')
        ->leftJoin('m_area_kerjas', 'm_departments.area_kerja_id', '=', 'm_area_kerjas.id')
        ->leftJoin('m_jabatans', 'users.jabatan_id', '=', 'm_jabatans.id')
        ->where('users.active', 1)
        ;

        if ($request->name!='') {
            $users = $users->where('users.name', 'like', '%'.$request->name.'%');
        }
        if ($request->email!='') {
            $users = $users->where('users.email', 'like', '%'.$request->email.'%');
        }
        if ($request->department_id!='') {
            $users = $users->where('users.department_id', $request->department_id);
        }
        if ($request->jabatan_id!='') {
            $users = $users->where('users.jabatan_id', $request->jabatan_id);
        }

        $datatables = Datatables::of($users)
            ->addColumn('aksi', function ($r) {
                $aksi_edit = '';
                $aksi_delete = '';
                $aksi_edit = '<a href="'.route('user.edit', $r->id).'" title="edit" style="color: #000;"><i class="fa fa-pencil"></i></a>';
                if ($r->jabatan_id!=1) {
                    // $aksi_delete = '<a href="#" title="delete" onclick="event.preventDefault(); btn_delete('.$r->id.')" style="color: #000;"><i class="fa fa-times"></i></a>';
                }

                return $aksi_edit.' '.$aksi_delete;
            })
            ->escapeColumns([])
        ;

        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }

        return $datatables->make(true);
	}

    public static function registerFromSeeder($name, $email, $password, $departmentId, $jabatanId)
    {
        $fields = array(
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'department_id' => $departmentId,
            'jabatan_id' => $jabatanId,
        );
        $rules = array(
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'department_id' => 'required',
            'jabatan_id' => 'required',
        );
        $messages = array(
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email tersebut sudah digunakan',
            'password.required' => 'Password tidak boleh kosong',
            'department_id.required' => 'Department tidak boleh kosong',
            'jabatan_id.required' => 'Jabatan tidak boleh kosong',
        );
        $validator = Validator::make($fields, $rules, $messages);
        // Validate the input and return correct response
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $user = new \App\User;
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->department_id = $departmentId;
        $user->jabatan_id = $jabatanId;
        $user->active = 1;
        $user->save();

        self::saveUpdateOther($user);

        return $user;
    }

	public function register($name, $email, $password, $departmentId, $jabatanId)
	{
		$fields = array(
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'department_id' => $departmentId,
            'jabatan_id' => $jabatanId,
        );
        $rules = array(
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'department_id' => 'required',
            'jabatan_id' => 'required',
        );
        $messages = array(
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email tersebut sudah digunakan',
            'password.required' => 'Password tidak boleh kosong',
            'department_id.required' => 'Department tidak boleh kosong',
            'jabatan_id.required' => 'Jabatan tidak boleh kosong',
        );
        $validator = Validator::make($fields, $rules, $messages);
        // Validate the input and return correct response
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

		$this->user->name = $name;
		$this->user->email = $email;
		$this->user->password = $password;
		$this->user->department_id = $departmentId;
		$this->user->jabatan_id = $jabatanId;
		$this->user->active = 1;
		$this->user->save();

		self::saveUpdateOther($this->user);

		return $this->user;
	}

	public function update($name, $email, $password=null, $departmentId, $jabatanId)
	{
		$fields = array(
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'department_id' => $departmentId,
            'jabatan_id' => $jabatanId,
        );
        $rules = array(
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->user->id,
            'department_id' => 'required',
            'jabatan_id' => 'required',
        );
        $messages = array(
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email tersebut sudah digunakan',
            'department_id.required' => 'Department tidak boleh kosong',
            'jabatan_id.required' => 'Jabatan tidak boleh kosong',
        );
        $validator = Validator::make($fields, $rules, $messages);
        // Validate the input and return correct response
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        if ($password) {
			$this->user->password = $password;
        }
		$this->user->name = $name;
		$this->user->email = $email;
		$this->user->department_id = $departmentId;
		$this->user->jabatan_id = $jabatanId;
		$this->user->save();

		self::saveUpdateOther($this->user);

		return $this->user;
	}

	private static function saveUpdateOther(\App\User $user)
	{
		// dms
    	$dms_user = \App\Models\dms\Dms_user::find($user->id);
    	if (!$dms_user) {
    		$dms_user = New \App\Models\dms\Dms_user;
    	}
    	$dms_user->id = $user->id;
    	$dms_user->name = $user->name;
        $dms_user->email = $user->email;
        $dms_user->password = $user->password;
        $dms_user->department_id = $user->department_id;
        $dms_user->jabatan_id = $user->jabatan_id;
        $dms_user->active = $user->active;
        $dms_user->save();

    	// library
    	$library_user = \App\Models\library\Library_user::find($user->id);
    	if (!$library_user) {
    		$library_user = New \App\Models\library\Library_user;
    	}
    	$library_user->id = $user->id;
    	$library_user->name = $user->name;
        $library_user->email = $user->email;
        $library_user->password = $user->password;
        $library_user->department_id = $user->department_id;
        $library_user->jabatan_id = $user->jabatan_id;
        $library_user->active = $user->active;
        $library_user->save();

    	// dw
    	$dw_user = \App\Models\dw\Dw_user::find($user->id);
    	if (!$dw_user) {
    		$dw_user = New \App\Models\dw\Dw_user;
    	}
    	$dw_user->id = $user->id;
    	$dw_user->name = $user->name;
        $dw_user->email = $user->email;
        $dw_user->password = $user->password;
        $dw_user->department_id = $user->department_id;
        $dw_user->jabatan_id = $user->jabatan_id;
        $dw_user->active = $user->active;
        $dw_user->save();

    	// kalibrasi
    	$kalibrasi_user = \App\Models\kalibrasi\Kalibrasi_user::find($user->id);
    	if (!$kalibrasi_user) {
        	$kalibrasi_user = New \App\Models\kalibrasi\Kalibrasi_user;
    	}
    	$kalibrasi_user->id = $user->id;
    	$kalibrasi_user->name = $user->name;
        $kalibrasi_user->email = $user->email;
        $kalibrasi_user->password = $user->password;
        $kalibrasi_user->department_id = $user->department_id;
        $kalibrasi_user->jabatan_id = $user->jabatan_id;
        $kalibrasi_user->active = $user->active;
        $kalibrasi_user->save();

    	// reagensia
    	$reagensia_user = \App\Models\reagensia\Reagensia_user::find($user->id);
    	if (!$reagensia_user) {
    		$reagensia_user = New \App\Models\reagensia\Reagensia_user;
    	}
    	$reagensia_user->id = $user->id;
    	$reagensia_user->name = $user->name;
        $reagensia_user->email = $user->email;
        $reagensia_user->password = $user->password;
        $reagensia_user->department_id = $user->department_id;
        $reagensia_user->jabatan_id = $user->jabatan_id;
        $reagensia_user->active = $user->active;
        $reagensia_user->save();

    	// stability 
    	$stability_user = \App\Models\stability\Stability_user::find($user->id);
    	if (!$stability_user) {
    		$stability_user = New \App\Models\stability\Stability_user;
    	}
    	$stability_user->id = $user->id;
    	$stability_user->name = $user->name;
        $stability_user->email = $user->email;
        $stability_user->password = $user->password;
        $stability_user->department_id = $user->department_id;
        $stability_user->jabatan_id = $user->jabatan_id;
        $stability_user->active = $user->active;
        $stability_user->save();
	}
}
