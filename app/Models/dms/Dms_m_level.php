<?php

namespace App\Models\dms;

use Illuminate\Database\Eloquent\Model;

class Dms_m_level extends Model
{
    //
	protected $connection = 'mysql_dms';
	protected $table = 'm_levels';
	protected $guarded = array();
}
