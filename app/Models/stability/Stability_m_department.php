<?php

namespace App\Models\stability;

use Illuminate\Database\Eloquent\Model;

class Stability_m_department extends Model
{
    protected $connection = 'mysql_stability';
    protected $table = 'm_departments';
    protected $fillable = ['area_kerja_id', 'nama', 'ket', 'active'];
    protected $guarded = array();


    public function area_kerja()
    {
        return $this->belongsTo(Stability_m_area_kerja::class);
    }
}
