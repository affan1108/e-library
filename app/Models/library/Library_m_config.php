<?php

namespace App\Models\library;

use Illuminate\Database\Eloquent\Model;

class Library_m_config extends Model
{
    protected $connection = 'mysql_library';
    protected $table = 'm_configs';
    protected $fillable = ['value'];
}
