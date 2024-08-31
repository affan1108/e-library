<?php

namespace App\Models\dw;

use Illuminate\Database\Eloquent\Model;

class Dw_m_department extends Model
{
    protected $connection = 'mysql_dw';
    protected $table = 'm_departments';
    protected $fillable = ['nama', 'ket', 'active', 'admin_user_id'];
    protected $guarded = array();

    public function area_kerja()
    {
        return $this->belongsTo(Dw_m_area_kerja::class);
    }
}
