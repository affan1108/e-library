<?php

namespace App\Models\dw;

use Illuminate\Database\Eloquent\Model;

class Dw_m_jabatan extends Model
{
    protected $connection = 'mysql_dw';
    protected $table = 'm_jabatans';
    protected $fillable = ['nama', 'ket'];
    protected $guarded = array();
}
