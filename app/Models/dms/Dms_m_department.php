<?php

namespace App\Models\dms;

use Illuminate\Database\Eloquent\Model;

class Dms_m_department extends Model
{
    protected $connection = 'mysql_dms';
    protected $table = 'm_departments';
    protected $fillable = ['area_kerja_id', 'nama', 'ket', 'active'];
    protected $guarded = array();


}
