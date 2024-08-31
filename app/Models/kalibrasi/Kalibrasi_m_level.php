<?php

namespace App\Models\kalibrasi;

use Illuminate\Database\Eloquent\Model;

class Kalibrasi_m_level extends Model
{
    protected $connection = 'mysql_kalibrasi';
    protected $table = 'm_levels';
    protected $guarded = array();
}
