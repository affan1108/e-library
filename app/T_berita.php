<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_berita extends Model
{
    protected $fillable = ['kategori_berita_id','judul','excerpt','body','featured_img','published_at'];

    public function kategori_berita()
    {
        return $this->belongsTo(M_kategori_berita::class, 'kategori_berita_id');
    }
}
