<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Frontend View Routes (for testing/development)
|--------------------------------------------------------------------------
|
| These routes allow viewing all frontend pages without backend controllers.
| Replace with real controller routes during backend integration.
|
*/

// ── Landing ──
Route::get('/', function () {
    return redirect('/login');
});

// ── Auth Routes ──
Route::get('/register', fn() => view('auth.register'))->name('register');
Route::post('/register', fn() => back())->name('register'); // stub
Route::get('/login', fn() => view('auth.login'))->name('login');
Route::post('/login', fn() => back())->name('login'); // stub
Route::post('/logout', fn() => redirect('/login'))->name('logout');

// ── Student Routes ──
Route::prefix('student')->group(function () {

    Route::get('/dashboard', fn() => view('student.dashboard'));

    // Multi-step form
    Route::get('/form/step/1', fn() => view('student.form.step1', [
        'student' => (object)['nama_lengkap'=>'','nisn'=>'','nik'=>'','tempat_lahir'=>'','tanggal_lahir'=>'','agama'=>'','no_hp'=>'','no_skl'=>''],
    ]));

    Route::get('/form/step/2', fn() => view('student.form.step2', [
        'addresses' => collect([]),
    ]));

    Route::get('/form/step/3', fn() => view('student.form.step3', [
        'parents' => collect([]),
    ]));

    Route::get('/form/step/4', fn() => view('student.form.step4', [
        'student' => (object)['sekolah_asal'=>'','penerima_bantuan'=>'Tidak','jenis_bantuan'=>'','nomor_bantuan'=>'','no_reg_akta'=>'','anak_ke'=>'','dari_saudara'=>'','no_kk'=>'','tinggi_badan'=>'','berat_badan'=>'','lingkar_kepala'=>'','hobi'=>'','cita_cita'=>''],
    ]));

    Route::get('/form/step/5', fn() => view('student.form.step5', [
        'document' => null,
    ]));

    Route::get('/form/step/6', fn() => view('student.form.step6'));

    Route::get('/review', fn() => view('student.review'));
    Route::post('/finalize', fn() => redirect('/student/print')); // stub
    Route::get('/print', fn() => view('student.print'));
});

// ── Admin Routes ──
Route::prefix('admin')->group(function () {

    Route::get('/dashboard', fn() => view('admin.dashboard', [
        'totalPendaftar' => 25,
        'belumFinalisasi' => 8,
        'menungguVerifikasi' => 12,
        'sudahVerifikasi' => 5,
    ]));

    Route::get('/students', fn() => view('admin.students.index', [
        'students' => collect([]),
    ]));

    Route::get('/students/{id}', fn($id) => view('admin.students.show', [
        'student' => (object)[
            'id' => $id,
            'nama_lengkap' => 'Contoh Siswa',
            'status_verifikasi' => 'MENUNGGU_VERIFIKASI',
            'current_step' => 6,
            'is_finalized' => true,
            'no_pendaftaran' => null,
            'user' => (object)['name' => 'Contoh Siswa', 'nisn' => '0012345678'],
            'addresses' => collect([]),
            'parents' => collect([]),
            'document' => null,
            'tempat_lahir' => 'Semarang',
            'tanggal_lahir' => '2008-05-15',
            'jenis_kelamin' => 'L',
            'agama' => 'Islam',
            'sekolah_asal' => 'SMP N 1 Semarang',
            'tinggi_badan' => 165,
            'berat_badan' => 55,
            'minat_bakat' => 'Robotika',
            'status_kip' => 'Tidak',
        ],
    ]));
});
