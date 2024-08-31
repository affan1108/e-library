<?php

namespace App\Models\dw;

use Illuminate\Database\Eloquent\Model;

class Dw_m_admin_department extends Model
{
    protected $connection = 'mysql_dw';
    protected $table = 'm_admin_departments';
    public $timestamps = false;
    protected $guarded = array();
}
