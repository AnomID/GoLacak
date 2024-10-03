<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi input email dan password
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Rate limiting untuk membatasi jumlah percobaan login
        $this->middleware('throttle:5,1'); // Batas 5 percobaan per menit

        // Coba otentikasi user
        if (Auth::attempt($credentials)) {
            // Regenerasi sesi untuk keamanan (mencegah serangan sesi)
            $request->session()->regenerate();

            // Cek role user untuk mengarahkan ke halaman yang sesuai
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.bulan.index'); // Halaman untuk admin
            } else {
                return redirect()->route('user.bulan.index'); // Halaman untuk user
            }
        }

        // Jika gagal login, kembalikan pesan error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        // Invalidate session
        $request->session()->invalidate();

        // Regenerate CSRF token
        $request->session()->regenerateToken();

        // Redirect to home page
        return redirect('/');
    }
}
