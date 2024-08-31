<?php

namespace App\Models\dms;

use Illuminate\Database\Eloquent\Model;

class Dms_t_doc extends Model
{
    protected $connection = 'mysql_dms';
    protected $table = 't_docs';
    protected $guarded = array();

    
}
