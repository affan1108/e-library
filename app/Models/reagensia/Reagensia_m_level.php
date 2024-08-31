<?php

namespace App\Models\reagensia;

use Illuminate\Database\Eloquent\Model;

class Reagensia_m_level extends Model
{
    protected $connection = 'mysql_reagensia';
    protected $table = 'm_levels';
    protected $guarded = array();
}
