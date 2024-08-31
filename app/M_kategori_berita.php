<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_kategori_berita extends Model
{
    protected $fillable = ['nama','ket'];

    public function beritas()
    {
        return $this->hasMany(T_berita::class, 'kategori_berita_id');
    }
}
