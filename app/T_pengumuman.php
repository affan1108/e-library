<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_pengumuman extends Model
{
    protected $table = 't_pengumumans';
    protected $fillable = ['judul','body','featured_img','published_at'];
}
