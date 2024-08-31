<?php

namespace App\Repositories;

use Illuminate\Validation\ValidationException;
use Validator;
use Yajra\Datatables\Datatables;
use DB;

use App\Models\dms\Dms_user;

class UserDc
{
	private $user;

	public function __construct(Dms_user $user)
	{
		$this->user = $user;
	}

    public static function getNotDc()
    {
        return Dms_user::where('active', 1)->where('is_dc', 0)->get();
    }
    public static function tableUserLevel($request)
    {
       DB::statement(DB::raw('set @rowaja=0'));
            $users = Dms_user::select([
            DB::raw('@rowaja  := @rowaja  + 1 AS rowaja'),
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
                $aksi_edit = '<a href="'.route('dms.editUserLevel', $r->id).'" title="edit" style="color: #000;"><i class="fa fa-pencil"></i></a>';
                $aksi_delete = '<a href="#" title="delete" onclick="event.preventDefault(); btn_delete('.$r->id.')" style="color: #000;"><i class="fa fa-times"></i></a>';

                return $aksi_edit.' '.$aksi_delete;
            })
            ->escapeColumns([])
        ;

        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('rowaja', 'whereRaw', '@rowaja  + 1 like ?', ["%{$keyword}%"]);
        }

        return $datatables->make(true);
    }
	public static function tableUserDc($request)
	{
		DB::statement(DB::raw('set @rownum=0'));
        $users = Dms_user::select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'users.id',
            'users.name',
            'users.email',
            'users.department_id',
            'users.jabatan_id',
            'm_departments.nama as department_nama',
            'm_jabatans.nama as jabatan_nama',
        ])
        ->join('m_departments', 'users.department_id', '=', 'm_departments.id')
        ->join('m_jabatans', 'users.jabatan_id', '=', 'm_jabatans.id')
        ->where('users.active', 1)
        ->where('users.is_dc', 1)
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
                $aksi_delete = '<a href="#" title="delete" onclick="event.preventDefault(); btn_delete('.$r->id.')" style="color: #000;"><i class="fa fa-times"></i></a>';

                return $aksi_delete;
            })
            ->escapeColumns([])
        ;

        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }

        return $datatables->make(true);
	}

    /**
     * set user as dc on DMS App
     */
    public function setDc()
    {
        $this->user->is_dc = 1;
        $this->user->save();
    }

    /**
     * unset user dc on DMS App
     */
    public function unsetDc()
    {
        $this->user->is_dc = null;
        $this->user->save();
    }
    public static function getUser($id=null)
    {
        if (!$id) {
            return \App\Models\dms\Dms_user::where('active', 1)->whereNull('level_id')->get();
        }

        return \App\Models\dms\Dms_user::find($id);
    }

    public static function getLevels()
    {
        return \App\Models\dms\Dms_m_level::where('aktif', 'y')->get();
        
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

        $user = \App\Models\dms\Dms_user::find($userId);
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