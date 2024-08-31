<?php

namespace App\Models\reagensia;

use Illuminate\Database\Eloquent\Model;

class Reagensia_m_jabatan extends Model
{
    protected $connection = 'mysql_reagensia';
    protected $table = 'm_jabatans';
    protected $fillable = ['nama', 'ket', 'active'];
    protected $guarded = array();
}
