<?php

namespace App\Repositories;

use Illuminate\Validation\ValidationException;
use Validator;
use Yajra\Datatables\Datatables;
use DB;

class UserRight
{
    const PORTAL_APP_ID = 1;
    const DMS_APP_ID = 2;
    const LIBRARY_APP_ID = 3;
    const DW_APP_ID = 4;
    const KALIBRASI_APP_ID = 5;
    const STABILITY_APP_ID = 6;
    const REAGENSIA_APP_ID = 7;
    
	private $userRight;

	public function __construct(\App\UserRight $userRight)
	{
		$this->userRight = $userRight;
	}

    public static function hasRight($userId, $appId)
    {
        $hasRight = \App\UserRight::where('user_id', $userId)->where('app_id', $appId)->first();
        $appName = \App\App::find($appId)->name;

        if (!$hasRight) {
            $response = [
                'success' => false,
                'message' => 'Anda tidak memiliki akses aplikasi '.$appName
            ];
            throw new \Exception("Anda tidak memiliki akses aplikasi ".$appName);
        }
        
        return true;
    }

	public static function tableUserRight($request)
    {
        $userLogin = \Auth::user();
        DB::statement(DB::raw('set @rownum=0'));
        $userRights = \App\UserRight::select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'user_rights.id',
            'user_rights.user_id',
            'user_rights.app_id',
            'users.name as user_name',
            'apps.name as app_name',
        ])
        ->join('users', 'user_rights.user_id', '=', 'users.id')
        ->join('apps', 'user_rights.app_id', '=', 'apps.id')
        ;

        // filter
        if ($request->user_name!='') {
            $userRights = $userRights->where('users.name', 'like', '%'.$request->user_name.'%');
        }
        if ($request->app_name!='') {
            $userRights = $userRights->where('apps.name', 'like', '%'.$request->app_name.'%');
        }

        $datatables = Datatables::of($userRights)
            ->addColumn('aksi', function ($d) use($userLogin) {
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

    public function store($userId, $appId)
    {
        $fields = array(
            'user_id' => $userId,
            'app_id' => $appId,
        );
        $rules = array(
            'user_id' => 'required',
            'app_id' => 'required',
        );
        $messages = array(
            'user_id.required' => 'User tidak boleh kosong',
            'app_id.required' => 'Aplikasi tidak boleh kosong',
        );
        $validator = Validator::make($fields, $rules, $messages);
        // Validate the input and return correct response
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

    	$cek = \App\UserRight::where('user_id', $userId)->where('app_id', $appId)->first();
    	if ($cek) {
    		throw new \Exception("Duplicate User Right");
    	}

    	$this->userRight->user_id = $userId;
    	$this->userRight->app_id = $appId;
    	$this->userRight->save();

    	return $this->userRight;
    }

    public function destroy()
    {
    	$this->userRight->delete();
    	return true;
    }
}