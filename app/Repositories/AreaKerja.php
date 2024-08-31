<?php

namespace App\Repositories;

class AreaKerja
{
	private $areaKerja;

	public function __construct(\App\M_area_kerja $areaKerja)
	{
		$this->areaKerja = $areaKerja;
	}

	public function store($id, $nama, $ket)
	{
		$this->areaKerja->id = $id;
		$this->areaKerja->nama = $nama;
		$this->areaKerja->ket = $ket;
		$this->areaKerja->save();

		self::storeUpdateOther($this->areaKerja);
	}

	private static function storeUpdateOther($areaKerja)
	{
		// dms
    	$dmsAreaKerja = \App\Models\dms\Dms_m_area_kerja::find($areaKerja->id);
    	if (!$dmsAreaKerja) {
    		$dmsAreaKerja = New \App\Models\dms\Dms_m_area_kerja;
    	}
    	$dmsAreaKerja->id = $areaKerja->id;
    	$dmsAreaKerja->nama = $areaKerja->nama;
        $dmsAreaKerja->ket = $areaKerja->ket;
        $dmsAreaKerja->save();

    	// library
    	$libraryAreaKerja = \App\Models\library\Library_m_area_kerja::find($areaKerja->id);
    	if (!$libraryAreaKerja) {
    		$libraryAreaKerja = New \App\Models\library\Library_m_area_kerja;
    	}
    	$libraryAreaKerja->id = $areaKerja->id;
        $libraryAreaKerja->nama = $areaKerja->nama;
        $libraryAreaKerja->ket = $areaKerja->ket;
        $libraryAreaKerja->save();

    	// dw
    	$dwAreaKerja = \App\Models\dw\Dw_m_area_kerja::find($areaKerja->id);
    	if (!$dwAreaKerja) {
    		$dwAreaKerja = New \App\Models\dw\Dw_m_area_kerja;
    	}
    	$dwAreaKerja->id = $areaKerja->id;
        $dwAreaKerja->nama = $areaKerja->nama;
        $dwAreaKerja->ket = $areaKerja->ket;
        $dwAreaKerja->save();

    	// kalibrasi
    	$kalibrasiAreaKerja = \App\Models\kalibrasi\Kalibrasi_m_area_kerja::find($areaKerja->id);
    	if (!$kalibrasiAreaKerja) {
        	$kalibrasiAreaKerja = New \App\Models\kalibrasi\Kalibrasi_m_area_kerja;
    	}
    	$kalibrasiAreaKerja->id = $areaKerja->id;
        $kalibrasiAreaKerja->nama = $areaKerja->nama;
        $kalibrasiAreaKerja->ket = $areaKerja->ket;
        $kalibrasiAreaKerja->save();

    	// reagensia
    	$reagensiaAreaKerja = \App\Models\reagensia\Reagensia_m_area_kerja::find($areaKerja->id);
    	if (!$reagensiaAreaKerja) {
    		$reagensiaAreaKerja = New \App\Models\reagensia\Reagensia_m_area_kerja;
    	}
    	$reagensiaAreaKerja->id = $areaKerja->id;
        $reagensiaAreaKerja->nama = $areaKerja->nama;
        $reagensiaAreaKerja->ket = $areaKerja->ket;
        $reagensiaAreaKerja->save();

    	// stability 
    	$stabilityAreaKerja = \App\Models\stability\Stability_m_area_kerja::find($areaKerja->id);
    	if (!$stabilityAreaKerja) {
    		$stabilityAreaKerja = New \App\Models\stability\Stability_m_area_kerja;
    	}
    	$stabilityAreaKerja->id = $areaKerja->id;
        $stabilityAreaKerja->nama = $areaKerja->nama;
        $stabilityAreaKerja->ket = $areaKerja->ket;
        $stabilityAreaKerja->save();
	}
}