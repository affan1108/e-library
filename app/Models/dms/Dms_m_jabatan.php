<?php

namespace App\Models\dms;

use Illuminate\Database\Eloquent\Model;

class Dms_m_jabatan extends Model
{
    protected $connection = 'mysql_dms';
    protected $table = 'm_jabatans';
    protected $fillable = ['nama', 'ket', 'active'];
    protected $guarded = array();
}
