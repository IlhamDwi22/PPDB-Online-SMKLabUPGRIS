<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'alamat_jalan',
        'rt',
        'rw',
        'kelurahan',
        'kecamatan',
    ];

    public function family_members()
    {
        return $this->hasMany(FamilyMember::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
