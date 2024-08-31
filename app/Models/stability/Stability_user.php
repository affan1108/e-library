<?php

namespace App\Models\stability;

use Illuminate\Database\Eloquent\Model;

class Stability_user extends Model
{
    protected $connection = 'mysql_stability';
    protected $table = 'users';
    protected $guarded = array();
    protected $fillable = [
        'id','name', 'email', 'password', 'department_id', 'jabatan_id', 'active'
    ];

    public function jabatan()
    {
        return $this->belongsTo(Stability_m_jabatan::class);
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function level()
    {
        return $this->belongsTo(Stability_m_level::class);
    }
}
