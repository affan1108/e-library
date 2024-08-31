<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_department extends Model
{
    protected $fillable = ['area_kerja_id', 'nama', 'ket', 'active'];

    public function area_kerja()
    {
        return $this->belongsTo(M_area_kerja::class, 'area_kerja_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'department_id');
    }
}
