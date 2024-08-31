<?php

namespace App\Models\dms;

use Illuminate\Database\Eloquent\Model;

class Dms_m_area_kerja extends Model
{
    protected $connection = 'mysql_dms';
    protected $table = 'm_area_kerjas';
    protected $fillable = ['user_dc'];
}
