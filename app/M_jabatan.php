<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_jabatan extends Model
{
    protected $fillable = ['nama', 'ket', 'active'];

    public function users()
    {
        return $this->hasMany(User::class, 'jabatan_id');
    }
}
