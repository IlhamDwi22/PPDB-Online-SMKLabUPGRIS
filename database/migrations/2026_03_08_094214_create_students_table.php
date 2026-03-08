<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('no_pendaftaran')->nullable()->unique();
            $table->enum('status_verifikasi', ['pending', 'verified', 'rejected'])->default('pending');
            $table->text('catatan_admin')->nullable();
            $table->string('nama_lengkap');
            $table->string('nisn', 10)->unique();
            $table->string('nik', 16)->unique();
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('agama');
            $table->string('no_hp');
            $table->string('no_skl')->nullable();
            $table->string('sekolah_asal');
            $table->boolean('penerima_kip')->default(false);
            $table->string('nomor_kip')->nullable();
            $table->string('nomor_reg_akta_lahir');
            $table->integer('anak_ke');
            $table->integer('dari_bersaudara');
            $table->string('no_kk', 16);
            $table->integer('berat_badan');
            $table->integer('tinggi_badan');
            $table->integer('lingkar_kepala');
            $table->string('hobi');
            $table->string('cita_cita');
            $table->string('pas_foto')->nullable();
            $table->foreignId('kk_address_id')->nullable()->constrained('addresses');
            $table->foreignId('domisili_address_id')->nullable()->constrained('addresses');
            $table->integer('current_step')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
