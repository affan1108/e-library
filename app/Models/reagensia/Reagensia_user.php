<?php

namespace App\Models\reagensia;

use Illuminate\Database\Eloquent\Model;

class Reagensia_user extends Model
{
    protected $connection = 'mysql_reagensia';
    protected $table = 'users';
    protected $guarded = array();
    protected $fillable = [
        'id','name', 'email', 'password', 'department_id', 'jabatan_id', 'active'
    ];

    public function jabatan()
    {
        return $this->belongsTo(Reagensia_m_jabatan::class);
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function level()
    {
        return $this->belongsTo(Reagensia_m_level::class);
    }
}
