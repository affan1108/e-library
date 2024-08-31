<?php

namespace App\Models\kalibrasi;

use Illuminate\Database\Eloquent\Model;

class Kalibrasi_user extends Model
{
    protected $connection = 'mysql_kalibrasi';
    protected $table = 'users';
    protected $guarded = array();
    protected $fillable = [
        'id','name', 'email', 'password', 'department_id', 'jabatan_id', 'active'
    ];

    public function jabatan()
    {
        return $this->belongsTo(Kalibrasi_m_jabatan::class);
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function level()
    {
        return $this->belongsTo(Kalibrasi_m_level::class);
    }
}
