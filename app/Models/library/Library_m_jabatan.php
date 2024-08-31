<?php

namespace App\Models\library;

use Illuminate\Database\Eloquent\Model;

class Library_m_jabatan extends Model
{
    protected $connection = 'mysql_library';
    protected $table = 'm_jabatans';
    protected $fillable = ['nama', 'ket', 'active'];
    protected $guarded = array();
}
