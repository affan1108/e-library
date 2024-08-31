<?php

namespace App\Models\reagensia;

use Illuminate\Database\Eloquent\Model;

class Reagensia_m_department extends Model
{
    protected $connection = 'mysql_reagensia';
    protected $table = 'm_departments';
    protected $fillable = ['area_kerja_id', 'nama', 'ket', 'active'];
    protected $guarded = array();


    public function area_kerja()
    {
        return $this->belongsTo(Reagensia_m_area_kerja::class);
    }
}
