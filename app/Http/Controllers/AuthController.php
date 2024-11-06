<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserModel;
use App\Models\LevelModel;

class AuthController extends Controller
{
    public function login() {
        if(Auth::check()) { // jika sudah login, maka redirect ke halaman home
            return redirect('/dashboard');
        }
        return view('auth.login');
    }

    public function postlogin(Request $request) {
        if($request->ajax() || $request->wantsJson()) {
            $credentials = $request->only('username', 'password');

            if(Auth::attempt($credentials)) {
                return response()->json([
                    'status' => true,
                    'message' => 'Login Berhasil',
                    'redirect' => url('/dashboard')
                ]);
            }

            return response()->json([
                'status' => false,
                'message' => 'Login Gagal'
            ]);
        }

        return redirect('login');
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function register() {
        $level = LevelModel::all();
        return view('auth.register', compact('level'));
    }

    public function postregister(Request $request) {
        if($request->ajax() || $request->wantsJson()) {
            $request->validate([
                'username' => 'required|string|min:3|unique:m_user,username',
                'nama' => 'required|string|max:100',
                'password' => 'required|min:6'
            ]);

            UserModel::create([
                'username' => $request->username,
                'nama' => $request->nama,
                'password' => bcrypt($request->password),
                'level_id' => $request->level_id
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Register Berhasil',
                'redirect' => url('/login')
            ]);
        }

        return redirect('register');
    }    
}