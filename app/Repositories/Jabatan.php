<?php

namespace App\Repositories;

use Illuminate\Validation\ValidationException;
use Validator;
use Yajra\Datatables\Datatables;
use DB;

class Jabatan
{
    const ADMIN_JABATAN_ID = 1;
    
	private $jabatan;

	public function __construct(\App\M_jabatan $jabatan)
	{
		$this->jabatan = $jabatan;
	}

    public static function getAll()
    {
        return \App\M_jabatan::all();
    }

    public static function tableJabatan($request)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $jabatans = \App\M_jabatan::select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'm_jabatans.id',
            'm_jabatans.nama',
            'm_jabatans.ket',
        ])
        ->where('m_jabatans.active', 1)
        ;

        if ($request->nama!='') {
            $jabatans = $jabatans->where('m_jabatans.nama', 'like', '%'.$request->nama.'%');
        }
        if ($request->ket!='') {
            $jabatans = $jabatans->where('m_jabatans.ket', 'like', '%'.$request->ket.'%');
        }

        $datatables = Datatables::of($jabatans)
            ->addColumn('aksi', function ($r) {
                $aksi_edit = '';
                $aksi_delete = '';
                $aksi_edit = '<a href="'.route('jabatan.edit', $r->id).'" title="edit" style="color: #000;"><i class="fa fa-pencil"></i></a>';
                $aksi_delete = '<a href="#" title="delete" onclick="event.preventDefault(); btn_delete('.$r->id.')" style="color: #000;"><i class="fa fa-times"></i></a>';

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
     * save new jabatan
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
            'nama.required' => 'Nama Jabatan tidak boleh kosong',
        );
        $validator = Validator::make($fields, $rules, $messages);
        // Validate the input and return correct response
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $this->jabatan->nama = $nama;
        $this->jabatan->ket = $ket;
        $this->jabatan->active = 1;
        $this->jabatan->save();

        // store other database
        self::saveUpdateOther($this->jabatan);
        
        return $this->jabatan;
    }

    /**
     * store new or update jabatan into other database
     * @param  \App\M_jabatan
     */
    private static function saveUpdateOther(\App\M_jabatan $jabatan)
    {
    	// dms
    	$dms_jabatan = \App\Models\dms\Dms_m_jabatan::find($jabatan->id);
    	if (!$dms_jabatan) {
    		$dms_jabatan = New \App\Models\dms\Dms_m_jabatan;
    	}
    	$dms_jabatan->id = $jabatan->id;
        $dms_jabatan->nama = $jabatan->nama;
        $dms_jabatan->ket = $jabatan->ket;
        $dms_jabatan->active = $jabatan->active;
        $dms_jabatan->save();

    	// library
    	$library_jabatan = \App\Models\library\Library_m_jabatan::find($jabatan->id);
    	if (!$library_jabatan) {
    		$library_jabatan = New \App\Models\library\Library_m_jabatan;
    	}
    	$library_jabatan->id = $jabatan->id;
        $library_jabatan->nama = $jabatan->nama;
        $library_jabatan->ket = $jabatan->ket;
        $library_jabatan->active = $jabatan->active;
        $library_jabatan->save();

    	// dw
    	$dw_jabatan = \App\Models\dw\Dw_m_jabatan::find($jabatan->id);
    	if (!$dw_jabatan) {
    		$dw_jabatan = New \App\Models\dw\Dw_m_jabatan;
    	}
    	$dw_jabatan->id = $jabatan->id;
        $dw_jabatan->nama = $jabatan->nama;
        $dw_jabatan->ket = $jabatan->ket;
        $dw_jabatan->active = $jabatan->active;
        $dw_jabatan->save();

    	// kalibrasi
    	$kalibrasi_jabatan = \App\Models\kalibrasi\Kalibrasi_m_jabatan::find($jabatan->id);
    	if (!$kalibrasi_jabatan) {
        	$kalibrasi_jabatan = New \App\Models\kalibrasi\Kalibrasi_m_jabatan;
    	}
    	$kalibrasi_jabatan->id = $jabatan->id;
        $kalibrasi_jabatan->nama = $jabatan->nama;
        $kalibrasi_jabatan->ket = $jabatan->ket;
        $kalibrasi_jabatan->active = $jabatan->active;
        $kalibrasi_jabatan->save();

    	// reagensia
    	$reagensia_jabatan = \App\Models\reagensia\Reagensia_m_jabatan::find($jabatan->id);
    	if (!$reagensia_jabatan) {
    		$reagensia_jabatan = New \App\Models\reagensia\Reagensia_m_jabatan;
    	}
    	$reagensia_jabatan->id = $jabatan->id;
        $reagensia_jabatan->nama = $jabatan->nama;
        $reagensia_jabatan->ket = $jabatan->ket;
        $reagensia_jabatan->active = $jabatan->active;
        $reagensia_jabatan->save();

    	// stability 
    	$stability_jabatan = \App\Models\stability\Stability_m_jabatan::find($jabatan->id);
    	if (!$stability_jabatan) {
    		$stability_jabatan = New \App\Models\stability\Stability_m_jabatan;
    	}
    	$stability_jabatan->id = $jabatan->id;
        $stability_jabatan->nama = $jabatan->nama;
        $stability_jabatan->ket = $jabatan->ket;
        $stability_jabatan->active = $jabatan->active;
        $stability_jabatan->save();
    }
}