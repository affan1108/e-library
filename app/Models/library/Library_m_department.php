<?php

namespace App\Models\library;

use Illuminate\Database\Eloquent\Model;

class Library_m_department extends Model
{
    protected $connection = 'mysql_library';
    protected $table = 'm_departments';
    protected $fillable = ['area_kerja_id', 'nama', 'ket', 'admin_user_id', 'active'];
    protected $guarded = array();


    public function area_kerja()
    {
        return $this->belongsTo(Library_m_area_kerja::class);
    }
}
