<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'nisn',
        'nik',
        'tempat_lahir',
        'tgl_lahir',
        'agama',
        'no_hp',
        'no_skl',
        'sekolah_asal',
        'penerima_kip',
        'nomor_kip',
        'nomor_reg_akta_lahir',
        'anak_ke',
        'dari_bersaudara',
        'no_kk',
        'berat_badan',
        'tinggi_badan',
        'lingkar_kepala',
        'hobi',
        'cita_cita',
        'pas_foto',
        'kk_address_id',
        'domisili_address_id',
        'current_step',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function familyMembers()
    {
        return $this->hasMany(FamilyMember::class);
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
