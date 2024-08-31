<?php

namespace App\Models\library;

use Illuminate\Database\Eloquent\Model;

class Library_user extends Model
{
    protected $connection = 'mysql_library';
    protected $table = 'users';
    protected $guarded = array();
    protected $fillable = [
        'id','name', 'email', 'password', 'department_id', 'jabatan_id', 'active'
    ];

    public function jabatan()
    {
        return $this->belongsTo(Library_m_jabatan::class);
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
