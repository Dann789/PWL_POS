<?php
namespace App\Http\Controllers;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
class ProfileController extends Controller
{
    public function index()
    {
        $user = UserModel::findOrFail(Auth::id());
        $breadcrumb = (object) [
            'title' => 'Profil',
            'list'  => ['Home', 'Profil']
        ];
        $activeMenu = 'profile';
        return view('profile', compact('user'),[
            'breadcrumb' => $breadcrumb, 
            'activeMenu' => $activeMenu
        ]);
    }
    public function update(Request $request, $id)
{
    $request->validate([
        'username' => 'required|string|min:3|unique:m_user,username,' . $id . ',user_id', 
        'nama'     => 'required|string|max:100',
        'password' => 'nullable|min:6',
    ]);

    $user = UserModel::find($id);
    $user->username = $request->username;
    $user->nama = $request->nama;

    if ($request->hasFile('avatar')) {
        // Hapus gambar lama jika ada
        if ($user->avatar && Storage::exists('public/photos/' . $user->avatar)) {
            Storage::delete('public/photos/' . $user->avatar);
        }
        // Simpan file baru
        $file = $request->file('avatar');
        $fileName = $file->hashName(); // menggunakan hashName untuk nama unik
        $file->storeAs('public/photos', $fileName);
        $user->avatar = $fileName;
    }

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    return back()->with('status', 'Profile Diperbarui');
}
}