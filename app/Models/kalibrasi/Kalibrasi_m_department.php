<?php

namespace App\Models\kalibrasi;

use Illuminate\Database\Eloquent\Model;

class Kalibrasi_m_department extends Model
{
    protected $connection = 'mysql_kalibrasi';
    protected $table = 'm_departments';
    protected $fillable = ['area_kerja_id', 'nama', 'ket', 'active'];
    protected $guarded = array();


    public function area_kerja()
    {
        return $this->belongsTo(Kalibrasi_m_area_kerja::class);
    }
}
