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
            $table->string('nik', 16)->unique()->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tgl_lahir');
            $table->string('agama')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('no_skl')->nullable();
            $table->string('sekolah_asal')->nullable();
            $table->boolean('penerima_kip')->default(false);
            $table->string('nomor_kip')->nullable();
            $table->string('nomor_reg_akta_lahir')->nullable();
            $table->integer('anak_ke')->nullable();
            $table->integer('dari_bersaudara')->nullable();
            $table->string('no_kk', 16)->nullable();
            $table->integer('berat_badan')->nullable();
            $table->integer('tinggi_badan')->nullable();
            $table->integer('lingkar_kepala')->nullable();
            $table->string('hobi')->nullable();
            $table->string('cita_cita')->nullable();
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
