<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Contracts\Service\Attribute\Required;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    //public function index() {
        
        
        // tambah data user dengan Eloquent Model
        // $data = [
        //     'username' => 'customer-1',
        //     'nama' => 'Pelanggan',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 4
        // ];
        // UserModel::insert($data); // tambah data ke tabel m_user
        
        // $data = [
        //     'nama' => 'Pelanggan Pertama',
        // ];
        // UserModel::where('username', 'customer-1')->update($data); // Update data user

        // // coba akses model UserModel
        // $user = UserModel::all(); // Mengambil semua data dari tabel m_user
        // return view('user', ['data' => $user]);

        // Fillable
        // $data = [
        //     'level_id' => 2,
        //     'username' => 'manager_tiga',
        //     'nama' => 'Manager 3',
        //     'password' => Hash::make('12345')
        // ];
        // UserModel::create($data);


        // $user = UserModel::find(1);
        // return view('user', ['data' => $user]);

        // $user = UserModel::where('level_id', 1)->first();
        // return view('user', ['data' => $user]);

        // $user = UserModel::firstWhere('level_id', 1);
        // return view('user', ['data' => $user]);

        // $user = UserModel::findOr(20, ['username', 'nama'], function() {
            //     abort(404);
            // });
            // return view('user', ['data' => $user]);
            
            // $user = UserModel::where('username', 'manager9')->firstOrFail();
            // return view('user', ['data' => $user]);
            
            // $user = UserModel::where('level_id', 2)->count();
            // // dd($user); // Supaya bisa tampil di view, tidak diperlukan
            // return view('user', ['data' => $user]);
            
            // $user = UserModel::firstOrCreate(
                //     [
                    //         'username' => 'manager',
                    //         'nama' => 'Manager',
                    //     ],
                    // );
                    // return view('user', ['data' => $user]);
                    
                    // $user = UserModel::firstOrCreate(
                        //     [
                            //         'username' => 'manager22',
                            //         'nama' => 'Manager Dua Dua',
                            //         'password' => Hash::make('12345'),
                            //         'level_id' => 2
                            //     ],
                            // );
                            // return view('user', ['data' => $user]);
                            
                            // $user = UserModel::firstOrNew(
                                //     [
                                    //         'username' => 'manager',
                                    //         'nama' => 'Manager',
                                    //     ],
                                    // );
                                    // return view('user', ['data' => $user]);
                                    
                                    // $user = UserModel::firstOrNew(
        //     [
        //         'username' => 'manager33',
        //         'nama' => 'Manager Tiga Tiga',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ],
        // );
        // $user->save();

        // return view('user', ['data' => $user]);

        // JS4 Praktikum 2.5
        // $user = UserModel::create([
        //     'username' => 'manager55',
        //     'nama' => 'Manager55',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 2,
        // ]);
        
        // $user->username = 'manager56';
        
        // $user->isDirty();
        // $user->isDirty('username');
        // $user->isDirty('nama');
        // $user->isDirty(['nama', 'username']);

        // $user->isClean();
        // $user->isClean('username');
        // $user->isClean('nama');
        // $user->isClean(['nama', 'username']);

        // $user->save();
        
        // $user->isDirty();
        // $user->isClean();
        // dd($user->isDirty());
        
        // $user = UserModel::create([
            //     'username' => 'manager11',
            //     'nama' => 'Manager11',
            //     'password' => Hash::make('12345'),
            //     'level_id' => 2,
            // ]);
            
            // $user->username = 'manager12';
            
            // $user->save();
            
            // $user->wasChanged();
            // $user->wasChanged('username');
            // $user->wasChanged(['username', 'level_id']);
            // $user->wasChanged('nama');
            // dd($user->wasChanged(['nama', 'username']));
            
            // $user = UserModel::all();
            // return view('user', ['data' => $user]);

            // $user = UserModel::with('level')->get();
            // return view('user', ['data' => $user]);
        //}

        // public function tambah() {
        //     return view('user_tambah');
        // }

        // public function tambah_simpan(Request $request) 
        // {
        //     UserModel::create([
        //         'username' => $request->username,
        //         'nama' => $request->nama,
        //         'password' => Hash::make('$request->password'),
        //         'level_id' => $request->level_id
        //     ]);

        //     return redirect('/user');
        // }

        // public function ubah($id) {
        //     $user = UserModel::find($id);
        //     return view('user_ubah', ['data' => $user]);
        // }

        // public function ubah_simpan($id, Request $request) {
        //     $user = UserModel::find($id);

        //     $user->username = $request->username;
        //     $user->nama = $request->nama;
        //     $user->password = Hash::make('$request->password');
        //     $user->level_id = $request->level_id;

        //     $user->save();

        //     return redirect('/user');
        // }

        // public function hapus($id) {
        //     $user = UserModel::find($id);
        //     $user->delete();

        //     return redirect('/user');
        // }

        public function index() {
            $breadcrumb = (object) [
                'title' => 'Daftar User',
                'list' => ['Home', 'User']
            ];

            $page = (object) [
                'title' => 'Daftar user yang terdaftar dalam sistem'
            ];

            $activeMenu = 'user'; //Set menu yang sedang aktif

            return view('user.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
        }

        public function list(Request $request) {
            $users = UserModel::select('user_id', 'username', 'nama', 'level_id')
            ->with('level');

            return DataTables::of($users)
            // Menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addIndexColumn()
            ->addColumn('aksi', function ($user) { // Menambah kolom aksi
                $btn = '<a href ="'.url('/user/' . $user->user_id).'" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href ="'.url('/user/' . $user->user_id . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="'.url('/user/'. $user->user_id).'">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm" onlick="return confirm(\'Apakah anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
        }

        public function create() {
            $breadcrumb = (object) [
                'title' => 'Tambah User',
                'list' => ['Home', 'User', 'Tambah']
            ];

            $page = (object) [
                'title' => 'Tambah user baru'
            ];

            $level = LevelModel::all(); //ambil data level untuk ditampilkan di form
            $activeMenu = 'user'; // set menu yang sedang aktif

            return view('user.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
        }

        public function store(Request $request) {
            $request->validate([
                // username harus diisi berupa string, minimal 3 karakter, dan bernilai unik di tabel m_user kolom username
                'username' => 'required|string|min:3|unique:m_user,username',
                'nama' => 'required|string|max:100', // nama harus diisi, berupa string, dan maksimal 100 karakter
                'password' => 'required|min:5', // password harus diisi dan minimal 5 karakter
                'level_id' => 'required|integer'
            ]);

            UserModel::create([
                'username' => $request->username,
                'nama' => $request->nama,
                'password' => bcrypt($request->password),
                'level_id' => $request->level_id,
            ]);

            return redirect('/user')->with('success', 'Data user berhasil disimpan');
        }

        public function show(string $id) {
            $user = UserModel::with('level')->find($id);

            $breadcrumb = (object) [
                'title' => 'Detail User',
                'list' => ['Home', 'User', 'Detail']
            ];

            $page = (object) [
                'title' => 'Detail user'
            ];

            $activeMenu = 'user'; // set menu yang sedang aktif

            return view('user.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu]);
        }

        public function edit(string $id) {
            $user = UserModel::find($id);
            $level = LevelModel::all();

            $breadcrumb = (object) [
                'title' => 'Edit User',
                'list' => ['Home', 'User', 'Edit']
            ];

            $page = (object) [
                'title' => 'Edit User'
            ];

            $activeMenu = 'user'; // set menu yang sedang aktif

            return view('user.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'level' => $level, 'activeMenu' => $activeMenu]);
        }

        public function update(Request $request, string $id) {
            $request->validate([
                // username harus diisi berupa string, minimal 3 karakter, dan bernilai unik di tabel m_user kolom username kecuali untuk user dengan id yang sedang diedit
                'username' => 'required|string|min:3|unique:m_user,username,'.$id.',user_id',
                'nama' => 'required|string|max:100', // nama harus diisi, berupa string, dan maksimal 100 karakter
                'password' => 'nullable|min:5', // password bisa diisi dan minimal 5 karakter
                'level_id' => 'required|integer'
            ]);

            UserModel::find($id)->update([
                'username' => $request->username,
                'nama' => $request->nama,
                'password' => $request->password ? bcrypt($request->password) : UserModel::find($id)->password,
                'level_id' => $request->level_id
            ]);

            return redirect('/user')->with('success', 'Data user berhasil diubah');
        }

        public function destroy(string $id) {
            $check = UserModel::find($id);
            if (!$check) { // untuk mengecek apakah data user dengan id yang dimaksud ada atau tidak
                return redirect('/user')->with('error', 'Data user tidak ditemukan');
            }

            try {
                UserModel::destroy($id); // hapus data level

                return redirect('/user')->with('success', 'Data user berhasil dihapus');
            } catch (\Illuminate\Database\QueryException $e) {
                // Jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
                return redirect('/user')->with('error', 'Data user gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
            }
        }
}
