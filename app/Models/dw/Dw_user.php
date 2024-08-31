<?php

namespace App\Models\dw;

use Illuminate\Database\Eloquent\Model;

class Dw_user extends Model
{
    protected $connection = 'mysql_dw';
    protected $table = 'users';
    protected $guarded = array();
    protected $fillable = [
        'id','name', 'email', 'password', 'department_id', 'jabatan_id', 'active'
    ];

    public function jabatan()
    {
        return $this->belongsTo(Dw_m_jabatan::class);
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
