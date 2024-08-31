<?php

namespace App\Models\stability;

use Illuminate\Database\Eloquent\Model;

class Stability_m_level extends Model
{
    protected $connection = 'mysql_stability';
    protected $table = 'm_levels';
    protected $guarded = array();
}
