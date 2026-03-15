<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'size:10', 'unique:'.User::class],
            'tgl_lahir' => ['required', 'date'],
        ]);

        $roleSiswa = Role::where('nama_role', 'siswa')->first();
        $user = DB::transaction(function () use ($request, $roleSiswa) {

            $passwordOtomatis = Carbon::parse($request->tgl_lahir)->format('dmY');
            $user = User::create([
                'role_id' => $roleSiswa->id,
                'name' => $request->name,
                'username' => $request->username,
                'password' => Hash::make($passwordOtomatis),
            ]);

            Student::create([
                'user_id' => $user->id,
                'nama_lengkap' => $request->name,
                'nisn' => $request->username,
                'tgl_lahir' => $request->tgl_lahir,
                'current_step' => 1,
                'status_verifikasi' => 'pending',
            ]);

            return $user;
        });

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
