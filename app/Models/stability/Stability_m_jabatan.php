<?php

namespace App\Models\stability;

use Illuminate\Database\Eloquent\Model;

class Stability_m_jabatan extends Model
{
    protected $connection = 'mysql_stability';
    protected $table = 'm_jabatans';
    protected $fillable = ['nama', 'ket', 'active'];
    protected $guarded = array();
}
