<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\LevelModel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class LevelController extends Controller
{
    // public function index() {

    //     // DB::insert('insert into m_level(level_id, level_kode, level_nama, created_at) values(?, ?, ?, ?)', [4, 'CUS', 'Pelanggan', now()]);
    //     // return 'Insert data baru berhasil';

    //     // $row = DB::update('update m_level set level_nama = ? where level_kode = ?', ['Customer', 'CUS']);
    //     // return 'Update data berhasil. Jumlah data yang diupdate: ' . $row . ' baris';

    //     // $row = DB::delete('delete from m_level where level_kode = ?', ['CUS']);
    //     // return 'Delete data berhasil. Jumlah data yang dihapus: ' . $row . ' baris';

    //     $data = DB::select('select * from m_level');
    //     return view('level', ['data' => $data]);
    // }

    public function index() {
        $breadcrumb = (object) [
            'title' => 'Daftar Level User',
            'list' => ['Home', 'Level']
        ];

        $page = (object) [
            'title' => 'Daftar level user yang ada di dalam sistem'
        ];

        $activeMenu = 'level';

        return view('level.mainLevel', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request) {
        // Ambil data level beserta levelnya
        $levels = LevelModel::select('level_id', 'level_kode', 'level_nama');

        // Return data untuk DataTables
        return DataTables::of($levels)
            ->addIndexColumn() // menambahkan kolom index / nomor urut
            ->addColumn('aksi', function ($level) {
                // Menambahkan kolom aksi untuk edit, detail, dan hapus

                // $btn = '<a href="' . url('/user/' . $user->user_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                // $btn .= '<a href="' . url('/user/' . $user->user_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                // $btn .= '<form class="d-inline-block" method="POST" action="' . url('/user/' . $user->user_id) . '">'
                //     . csrf_field() . method_field('DELETE') .
                //     '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                // return $btn;

                $btn = '<button onclick="modalAction(\'' . url('/level/' . $level->level_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/level/' . $level->level_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/level/' . $level->level_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi berisi HTML
            ->make(true);
    }

    public function create() {
        $breadcrumb = (object) [
            'title' => 'Tambah Level User',
            'list' => ['Home', 'Level', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah level user baru'
        ];

        $activeMenu = 'level';

        return view('level.createLevel', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request) {
        $request->validate([
            'level_kode' => 'required|string|max:10|unique:m_level,level_kode',
            'level_nama' => 'required|string|max:100'
        ]);

        LevelModel::create([
            'level_kode' => $request->level_kode,
            'level_nama' => $request->level_nama
        ]);

        return redirect('/level')->with('success', 'Data level user berhasil disimpan');
    }

    // public function show(string $id) {
    //     $level = LevelModel::where('level_id', $id)->first();

    //     $breadcrumb = (object) [
    //         'title' => 'Detail Level User',
    //         'list' => ['Home', 'Level', 'Detail']
    //     ];

    //     $page = (object) [
    //         'title' => 'Detail level user'
    //     ];

    //     $activeMenu = 'level';

    //     return view('level.showLevel', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    // }

    public function edit(string $id) {
        $level = LevelModel::where('level_id', $id)->first();

        $breadcrumb = (object) [
            'title' => 'Edit Level User',
            'list' => ['Home', 'Level', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Level User'
        ];

        $activeMenu = 'level'; // set menu yang sedang aktif

        return view('level.editLevel', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, string $id) {
        $request->validate([
            'level_kode' => 'required|string|max:10|unique:m_level,level_kode,'.$id.',level_id',
            'level_nama' => 'required|string|max:100'
        ]);

        LevelModel::where('level_id', $id)->update([
            'level_kode' => $request->level_kode,
            'level_nama' => $request->level_nama
        ]);

        return redirect('/level')->with('success', 'Data level user berhasil diubah');
    }

    public function destroy(string $id) {
        $check = LevelModel::where('level_id', $id)->first();
        if (!$check) {
            return redirect('/level')->with('error', 'Data level tidak ditemukan');
        }

        try {
            LevelModel::where('level_id', $id)->delete();

            return redirect('/level')->with('success', 'Data level berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/level')->with('error', 'Data level gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }

    public function create_ajax() {
         return view('level.create_ajax');
    }

    public function store_ajax(Request $request)
     {
         // Cek apakah request berupa ajax atau ingin JSON
         if ($request->ajax() || $request->wantsJson()) {
             $rules = [
                 'level_kode' => 'required|string|max:10|unique:m_level,level_kode',
                 'level_nama' => 'required|string|max:100',
             ];
 
             // Gunakan Validator dari Illuminate\Support\Facades\Validator;
             $validator = Validator::make($request->all(), $rules);
             // Jika validasi gagal
             if ($validator->fails()) {
                 return response()->json([
                     'status' => false, // response status, false: error/gagal, true: berhasil
                     'message' => 'Validasi Gagal',
                     'msgField' => $validator->errors(), // pesan error validasi
                 ]);
             }
             // Simpan data level
             LevelModel::create($request->all());
 
             // Jika berhasil
             return response()->json([
                 'status' => true,
                 'message' => 'Data level berhasil disimpan',
             ]);
         }
         // Redirect jika bukan request Ajax
         return redirect('/');
     }

    public function edit_ajax(string $id) {
        $level = LevelModel::find($id);
        return view('level.edit_ajax', ['level' => $level]);
    }

    public function update_ajax(Request $request, $id) {
        // cek apakah request dari ajax
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'level_kode' => 'required|max:10|unique:m_level,level_kode,'.$id.',level_id',
                'level_nama' => 'required|max:100'
            ];

            // use Illuminate\Support\Facades\Validator;
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false, // respon json, true: berhasil, false: gagal
                    'message' => 'Validasi gagal.',
                    'msgField' => $validator->errors() // menunjukkan field mana yang error
                ]);
            }

            $check = LevelModel::find($id);
            if ($check) {
                $check->update($request->all());
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil diupdate'
                ]);
            } else{
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
        }
        return redirect('/');
    }

    public function confirm_ajax(string $id) {
        $level = LevelModel::find($id);
        return view('level.confirm_ajax', ['level' => $level]);
    }

    public function delete_ajax(Request $request, $id) {
        // cek apakah request dari ajax
        if ($request->ajax() || $request->wantsJson()) {
            $level = LevelModel::find($id);
            if ($level) {
                $level->delete();
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil dihapus'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
        }
        return redirect('/');
    }
}
