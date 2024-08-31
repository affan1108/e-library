<?php

namespace App\Repositories;

use Illuminate\Validation\ValidationException;
use Validator;
use Yajra\Datatables\Datatables;
use DB;

class Department
{
	const DEFAULT_AREA_KERJA_ID = 1;

	private $department;

	public function __construct(\App\M_department $department)
	{
		$this->department = $department;
	}

    public static function getAll()
    {
        return \App\M_department::where('active', 1)->get();
    }

	public static function tableDepartment($request)
    {
        $userLogin = \Auth::user();
        DB::statement(DB::raw('set @rownum=0'));
        $departments = \App\M_department::select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'm_departments.id',
            'm_departments.nama',
            'm_departments.ket',
        ])
        ;

        // filter
        if ($request->nama!='') {
            $departments = $departments->where('m_departments.nama', 'like', '%'.$request->nama.'%');
        }
        if ($request->ket!='') {
            $departments = $departments->where('m_departments.ket', 'like', '%'.$request->ket.'%');
        }

        $datatables = Datatables::of($departments)
            ->addColumn('aksi', function ($d) use($userLogin) {
                $aksi_edit = '';
                $aksi_delete = '';
                $aksi_edit = '<a href="'.route('department.edit', $d->id).'" title="edit" style="color: #000;"><i class="fa fa-pencil"></i></a>';
                // $aksi_delete = '<a href="#" title="delete" onclick="event.preventDefault(); btn_delete('.$d->id.')" style="color: #000;"><i class="fa fa-times"></i></a>';

                return $aksi_edit.' '.$aksi_delete;
            })
            ->escapeColumns([])
        ;

        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }

        return $datatables->make(true);
    }

    /**
     * save new department
     * @param  String 
     * @param  String
     * @return Model
     */
    public function store($nama, $ket)
    {
    	$fields = array(
            'nama' => $nama,
        );
        $rules = array(
            'nama' => 'required',
        );
        $messages = array(
            'nama.required' => 'Nama Department tidak boleh kosong',
        );
        $validator = Validator::make($fields, $rules, $messages);
        // Validate the input and return correct response
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $this->department->area_kerja_id = self::DEFAULT_AREA_KERJA_ID;
        $this->department->nama = $nama;
        $this->department->ket = $ket;
        $this->department->active = 1;
        $this->department->save();

        // store other database
        self::saveUpdateOther($this->department);
        
        return $this->department;
    }

    /**
     * update department
     * @param  String 
     * @param  String
     * @return Model
     */
    public function update($nama, $ket)
    {
    	$fields = array(
            'nama' => $nama,
        );
        $rules = array(
            'nama' => 'required',
        );
        $messages = array(
            'nama.required' => 'Nama Department tidak boleh kosong',
        );
        $validator = Validator::make($fields, $rules, $messages);
        // Validate the input and return correct response
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $this->department->nama = $nama;
        $this->department->ket = $ket;
        $this->department->save();

        // store other database
        self::saveUpdateOther($this->department);
        
        return $this->department;
    }

    /**
     * store new or update department into other database
     * @param  \App\M_department
     */
    private static function saveUpdateOther(\App\M_department $department)
    {
    	// dms
    	$dms_department = \App\Models\dms\Dms_m_department::find($department->id);
    	if (!$dms_department) {
    		$dms_department = New \App\Models\dms\Dms_m_department;
    	}
    	$dms_department->id = $department->id;
    	$dms_department->area_kerja_id = $department->area_kerja_id;
        $dms_department->nama = $department->nama;
        $dms_department->ket = $department->ket;
        $dms_department->active = $department->active;
        $dms_department->save();

    	// library
    	$library_department = \App\Models\library\Library_m_department::find($department->id);
    	if (!$library_department) {
    		$library_department = New \App\Models\library\Library_m_department;
    	}
    	$library_department->id = $department->id;
    	$library_department->area_kerja_id = $department->area_kerja_id;
        $library_department->nama = $department->nama;
        $library_department->ket = $department->ket;
        $library_department->active = $department->active;
        $library_department->save();

    	// dw
    	$dw_department = \App\Models\dw\Dw_m_department::find($department->id);
    	if (!$dw_department) {
    		$dw_department = New \App\Models\dw\Dw_m_department;
    	}
    	$dw_department->id = $department->id;
    	$dw_department->area_kerja_id = $department->area_kerja_id;
        $dw_department->nama = $department->nama;
        $dw_department->ket = $department->ket;
        $dw_department->active = $department->active;
        $dw_department->save();

    	// kalibrasi
    	$kalibrasi_department = \App\Models\kalibrasi\Kalibrasi_m_department::find($department->id);
    	if (!$kalibrasi_department) {
        	$kalibrasi_department = New \App\Models\kalibrasi\Kalibrasi_m_department;
    	}
    	$kalibrasi_department->id = $department->id;
    	$kalibrasi_department->area_kerja_id = $department->area_kerja_id;
        $kalibrasi_department->nama = $department->nama;
        $kalibrasi_department->ket = $department->ket;
        $kalibrasi_department->active = $department->active;
        $kalibrasi_department->save();

    	// reagensia
    	$reagensia_department = \App\Models\reagensia\Reagensia_m_department::find($department->id);
    	if (!$reagensia_department) {
    		$reagensia_department = New \App\Models\reagensia\Reagensia_m_department;
    	}
    	$reagensia_department->id = $department->id;
    	$reagensia_department->area_kerja_id = $department->area_kerja_id;
        $reagensia_department->nama = $department->nama;
        $reagensia_department->ket = $department->ket;
        $reagensia_department->active = $department->active;
        $reagensia_department->save();

    	// stability 
    	$stability_department = \App\Models\stability\Stability_m_department::find($department->id);
    	if (!$stability_department) {
    		$stability_department = New \App\Models\stability\Stability_m_department;
    	}
    	$stability_department->id = $department->id;
    	$stability_department->area_kerja_id = $department->area_kerja_id;
        $stability_department->nama = $department->nama;
        $stability_department->ket = $department->ket;
        $stability_department->active = $department->active;
        $stability_department->save();
    }

}