<?php

namespace App\Models\dms;

use Illuminate\Database\Eloquent\Model;

class Dms_user extends Model
{
    protected $connection = 'mysql_dms';
    protected $table = 'users';
    protected $guarded = array();
    protected $fillable = [
        'id','name', 'email', 'password', 'department_id', 'jabatan_id', 'active'
    ];

    public function jabatan()
    {
        return $this->belongsTo(Dms_m_jabatan::class);
    }

    public function department()
    {
        return $this->belongsTo(Dms_m_department::class);
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
    public function level()
    {
        return $this->belongsTo(Dms_m_level::class);
    }

}
