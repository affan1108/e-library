<?php

namespace App\Repositories;

use Illuminate\Validation\ValidationException;
use Validator;
use Yajra\Datatables\Datatables;
use DB;

class Kalibrasi
{
	private $user;
	public function __construct(\App\Models\kalibrasi\Kalibrasi_user $user)
	{
		$this->user = $user;
	}

	public static function tableUserLevel($request)
	{
		DB::statement(DB::raw('set @rownum=0'));
        $users = \App\Models\kalibrasi\Kalibrasi_user::select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'users.id',
            'users.name',
            'users.email',
            'users.department_id',
            'users.jabatan_id',
            'users.level_id',
            'm_departments.nama as department_nama',
            'm_area_kerjas.nama as area_kerja_nama',
            'm_jabatans.nama as jabatan_nama',
            'm_levels.nama as level_nama',
        ])
        ->join('m_departments', 'users.department_id', '=', 'm_departments.id')
        ->join('m_area_kerjas', 'm_departments.area_kerja_id', '=', 'm_area_kerjas.id')
        ->join('m_jabatans', 'users.jabatan_id', '=', 'm_jabatans.id')
        ->join('m_levels', 'users.level_id', '=', 'm_levels.id')
        ->where('users.active', 1)
        ->whereNotNull('users.level_id')
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
        if ($request->level_id!='') {
            $users = $users->where('users.level_id', $request->level_id);
        }

        $datatables = Datatables::of($users)
            ->addColumn('aksi', function ($r) {
                $aksi_edit = '';
                $aksi_delete = '';
                $aksi_edit = '<a href="'.route('kalibrasi.editUserLevel', $r->id).'" title="edit" style="color: #000;"><i class="fa fa-pencil"></i></a>';
                $aksi_delete = '<a href="#" title="delete" onclick="event.preventDefault(); btn_delete('.$r->id.')" style="color: #000;"><i class="fa fa-times"></i></a>';

                return $aksi_edit.' '.$aksi_delete;
            })
            ->escapeColumns([])
        ;

        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }

        return $datatables->make(true);
	}

	public static function getUser($id=null)
	{
		if (!$id) {
			return \App\Models\kalibrasi\Kalibrasi_user::where('active', 1)->whereNull('level_id')->get();
		}

		return \App\Models\kalibrasi\Kalibrasi_user::find($id);
	}

	public static function getLevels()
	{
		return \App\Models\kalibrasi\Kalibrasi_m_level::where('aktif', 'y')->get();
		
	}

	public function update($userId, $levelId)
	{
		$fields = array(
            'user_id' => $userId,
            'level_id' => $levelId,
        );
        $rules = array(
            'user_id' => 'required',
            'level_id' => 'required',
        );
        $messages = array(
            'user_id.required' => 'User tidak boleh kosong',
            'level_id.required' => 'Level tidak boleh kosong',
        );
        $validator = Validator::make($fields, $rules, $messages);
        // Validate the input and return correct response
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $user = \App\Models\kalibrasi\Kalibrasi_user::find($userId);
        $user->level_id = $levelId;
        $user->save();

        return $user;
	}

	public function delete()
	{
        $this->user->level_id = null;
        $this->user->save();

        return $this->user;
	}
}
