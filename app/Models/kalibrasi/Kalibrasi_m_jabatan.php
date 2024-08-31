<?php

namespace App\Models\kalibrasi;

use Illuminate\Database\Eloquent\Model;

class Kalibrasi_m_jabatan extends Model
{
    protected $connection = 'mysql_kalibrasi';
    protected $table = 'm_jabatans';
    protected $fillable = ['nama', 'ket', 'active'];
    protected $guarded = array();
}
