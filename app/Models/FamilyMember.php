<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{
    protected $fillable = [
        'student_id',
        'family_type',
        'nama_lengkap',
        'nik',
        'tempat_lahir',
        'tgl_lahir',
        'pendidikan',
        'pekerjaan',
        'penghasilan_bulanan',
        'no_hp',
        'kk_address_id',
        'domisili_address_id',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function kkAddress()
    {
        return $this->belongsTo(Address::class, 'kk_address_id');
    }

    public function domisiliAddress()
    {
        return $this->belongsTo(Address::class, 'domisili_address_id');
    }
}
