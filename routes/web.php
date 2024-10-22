<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\TransaksiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::pattern('id', '[0-9]+');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postlogin']);
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'postregister']);
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/', [WelcomeController::class, 'index']);

    Route::middleware(['authorize:ADM'])->group(function () {
        Route::group(['prefix' => 'user'], function () {
            Route::get('/', [UserController::class, 'index']);              // menampilkan halaman awal user
            Route::post('/list', [UserController::class, 'list']);          // menampilkan data user dalam bentuk json untuk datatables
            Route::get('/create', [UserController::class, 'create']);       // menampilkan halaman form tambah user
            Route::post('/', [UserController::class, 'store']);             // menyimpan data user baru
            Route::get('/create_ajax', [UserController::class, 'create_ajax']); // Menampilkan halaman form tambah user Ajax
            Route::post('/ajax', [UserController::class, 'store_ajax']); // Menyimpan data user baru Ajax
            Route::get('/{id}', [UserController::class, 'show']);           // menampilkan detail user
            Route::get('/{id}/edit', [UserController::class, 'edit']);     // menampilkan halaman form edit user
            Route::put('/{id}', [UserController::class, 'update']);         // menyiapkan perubahan data user
            Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']); // Menampilkan halaman form edit user Ajax 
            Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']); // Menyimpan perubahan data user Ajax
            Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']); // Untuk tampilkan form confirm delete user Ajax
            Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']); // Untuk hapus data user Ajax
            Route::delete('/{id}', [UserController::class, 'destroy']);     // menghapus data user
            Route::get('/import', [UserController::class, 'import']);
            Route::post('/import_ajax', [UserController::class, 'import_ajax']);
            Route::get('/export_excel', [UserController::class, 'export_excel']);
            Route::get('/export_pdf', [UserController::class, 'export_pdf']);
        });
    });

    Route::middleware(['authorize:ADM'])->group(function () {
        Route::group(['prefix' => 'level'], function () {
            Route::get('/', [LevelController::class, 'index']);
            Route::post('/list', [LevelController::class, 'list']);
            Route::get('/create', [LevelController::class, 'create']);
            Route::get('/create_ajax', [LevelController::class, 'create_ajax']);
            Route::post('/ajax', [LevelController::class, 'store_ajax']);
            Route::post('/', [LevelController::class, 'store']);
            Route::get('/{id}', [LevelController::class, 'show']);
            Route::get('/{id}/edit', [LevelController::class, 'edit']);
            Route::put('/{id}', [LevelController::class, 'update']);
            Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']);
            Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']);
            Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']);
            Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']);
            Route::delete('/{id}', [LevelController::class, 'destroy']);
            Route::get('/import', [LevelController::class, 'import']);
            Route::post('/import_ajax', [LevelController::class, 'import_ajax']);
            Route::get('/export_excel', [LevelController::class, 'export_excel']);
            Route::get('/export_pdf', [LevelController::class, 'export_pdf']);
        });
    });

    Route::middleware(['authorize:ADM,MNG,STF'])->group(function () {
        Route::group(['prefix' => 'kategori'], function () {
            Route::get('/', [KategoriController::class, 'index']);              // menampilkan halaman awal kategori
            Route::post('/list', [KategoriController::class, 'list']);          // menampilkan data kategori dalam bentuk json untuk datatables
            Route::get('/create', [KategoriController::class, 'create']);       // menampilkan halaman form tambah kategori
            Route::get('/create_ajax', [KategoriController::class, 'create_ajax']); // Menampilkan halaman form tambah kategori Ajax
            Route::post('/ajax', [KategoriController::class, 'store_ajax']); // Menyimpan data kategori baru Ajax
            Route::post('/', [KategoriController::class, 'store']);             // menyimpan data kategori baru
            Route::get('/{id}', [KategoriController::class, 'show']);           // menampilkan detail kategori
            Route::get('/{id}/edit', [KategoriController::class, 'edit']);     // menampilkan halaman form edit kategori
            Route::put('/{id}', [KategoriController::class, 'update']);         // menyiapkan perubahan data kategori
            Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']); // Menampilkan halaman form edit kategori Ajax 
            Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']); // Menyimpan perubahan data kategori Ajax
            Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']); // Untuk tampilkan form confirm delete kategori Ajax
            Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']); // Untuk hapus data kategori Ajax
            Route::delete('/{id}', [KategoriController::class, 'destroy']);     // menghapus data kategori
            Route::get('/import', [KategoriController::class, 'import']);
            Route::post('/import_ajax', [KategoriController::class, 'import_ajax']);
            Route::get('/export_excel', [KategoriController::class, 'export_excel']);
            Route::get('/export_pdf', [KategoriController::class, 'export_pdf']);
        });
    });

    Route::middleware(['authorize:ADM,MNG,STF'])->group(function () {
        Route::group(['prefix' => 'barang'], function () {
            Route::get('/', [BarangController::class, 'index']);              // menampilkan halaman awal barang
            Route::post('/list', [BarangController::class, 'list']);          // menampilkan data barang dalam bentuk json untuk datatables
            Route::get('/create_ajax', [BarangController::class, 'create_ajax']); // Menampilkan halaman form tambah barang Ajax
            Route::post('/ajax', [BarangController::class, 'store_ajax']); // Menyimpan data barang baru Ajax
            Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']); // Menampilkan halaman form edit barang Ajax 
            Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']); // Menyimpan perubahan data barang Ajax
            Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']); // Untuk tampilkan form confirm delete barang Ajax
            Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']); // Untuk hapus data barang Ajax
            Route::get('/import', [BarangController::class, 'import']);
            Route::post('/import_ajax', [BarangController::class, 'import_ajax']);
            Route::get('/export_excel', [BarangController::class, 'export_excel']);
            Route::get('/export_pdf', [BarangController::class, 'export_pdf']);
            //Route::get('/create', [BarangController::class, 'create']);       // menampilkan halaman form tambah barang
            //Route::post('/', [BarangController::class, 'store']);             // menyimpan data barang baru
            //Route::get('/{id}', [BarangController::class, 'show']);           // menampilkan detail barang
            //Route::get('/{id}/edit', [BarangController::class, 'edit']);     // menampilkan halaman form edit barang
            //Route::put('/{id}', [BarangController::class, 'update']);         // menyiapkan perubahan data barang
            //Route::delete('/{id}', [BarangController::class, 'destroy']);     // menghapus data barang
        });
    });

    Route::middleware(['authorize:ADM,MNG,STF'])->group(function () {
        Route::group(['prefix' => 'supplier'], function () {
            Route::get('/', [SupplierController::class, 'index']);              // menampilkan halaman awal supplier
            Route::post('/list', [SupplierController::class, 'list']);          // menampilkan data supplier dalam bentuk json untuk datatables
            Route::get('/create', [SupplierController::class, 'create']);       // menampilkan halaman form tambah supplier
            Route::get('/create_ajax', [SupplierController::class, 'create_ajax']); // Menampilkan halaman form tambah supplier Ajax
            Route::post('/ajax', [SupplierController::class, 'store_ajax']); // Menyimpan data supplier baru Ajax
            Route::post('/', [SupplierController::class, 'store']);             // menyimpan data supplier baru
            Route::get('/{id}', [SupplierController::class, 'show']);           // menampilkan detail supplier
            Route::get('/{id}/edit', [SupplierController::class, 'edit']);     // menampilkan halaman form edit supplier
            Route::put('/{id}', [SupplierController::class, 'update']);         // menyiapkan perubahan data supplier
            Route::get('/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']); // Menampilkan halaman form edit supplier Ajax 
            Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']); // Menyimpan perubahan data supplier Ajax
            Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']); // Untuk tampilkan form confirm delete supplier Ajax
            Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']); // Untuk hapus data supplier Ajax
            Route::delete('/{id}', [SupplierController::class, 'destroy']);     // menghapus data supplier
            Route::get('/import', [SupplierController::class, 'import']);
            Route::post('/import_ajax', [SupplierController::class, 'import_ajax']);
            Route::get('/export_excel', [SupplierController::class, 'export_excel']);
            Route::get('/export_pdf', [SupplierController::class, 'export_pdf']);
        });
    });

    Route::middleware(['authorize:ADM,MNG,STF'])->group(function () {
        Route::group(['prefix' => 'stok'], function () {
            Route::get('/', [StokController::class, 'index']);              // menampilkan halaman awal stok
            Route::post('/list', [StokController::class, 'list']);          // menampilkan data stok dalam bentuk json untuk datatables
            Route::get('/create_ajax', [StokController::class, 'create_ajax']); // Menampilkan halaman form tambah supplier Ajax
            Route::post('/ajax', [StokController::class, 'store_ajax']); // Menyimpan data stok baru Ajax
            Route::get('/{id}/edit_ajax', [StokController::class, 'edit_ajax']); // Menampilkan halaman form edit stok Ajax 
            Route::put('/{id}/update_ajax', [StokController::class, 'update_ajax']); // Menyimpan perubahan data stok Ajax
            Route::get('/{id}/delete_ajax', [StokController::class, 'confirm_ajax']); // Untuk tampilkan form confirm delete stok Ajax
            Route::delete('/{id}/delete_ajax', [StokController::class, 'delete_ajax']); // Untuk hapus data stok Ajax
            Route::get('/import', [StokController::class, 'import']);
            Route::post('/import_ajax', [StokController::class, 'import_ajax']);
            Route::get('/export_excel', [StokController::class, 'export_excel']);
            Route::get('/export_pdf', [StokController::class, 'export_pdf']);
        });
    });

    Route::middleware(['authorize:ADM,MNG,STF'])->group(function () {
        Route::group(['prefix' => 'penjualan'], function () {
            Route::get('/', [TransaksiController::class, 'index']);              // menampilkan halaman awal stok
            Route::post('/list', [TransaksiController::class, 'list']);          // menampilkan data stok dalam bentuk json untuk datatables
            Route::get('/create_ajax', [TransaksiController::class, 'create_ajax']); // Menampilkan halaman form tambah supplier Ajax
            Route::get('/{id}/show_ajax', [TransaksiController::class, 'show_ajax']);  
            Route::post('/ajax', [TransaksiController::class, 'store_ajax']); // Menyimpan data stok baru Ajax
            Route::get('/{id}/edit_ajax', [TransaksiController::class, 'edit_ajax']); // Menampilkan halaman form edit stok Ajax 
            Route::put('/{id}/update_ajax', [TransaksiController::class, 'update_ajax']); // Menyimpan perubahan data stok Ajax
            Route::get('/{id}/delete_ajax', [TransaksiController::class, 'confirm_ajax']); // Untuk tampilkan form confirm delete stok Ajax
            Route::delete('/{id}/delete_ajax', [TransaksiController::class, 'delete_ajax']); // Untuk hapus data stok Ajax
            Route::get('/import', [TransaksiController::class, 'import']);
            Route::post('/import_ajax', [TransaksiController::class, 'import_ajax']);
            Route::get('/export_excel', [TransaksiController::class, 'export_excel']);
            Route::get('/export_pdf', [TransaksiController::class, 'export_pdf']);
        });
    });
});
        // Route::get('/create', [StokController::class, 'create']);       // menampilkan halaman form tambah stok
        // Route::post('/', [StokController::class, 'store']);             // menyimpan data stok baru
        // Route::get('/{id}', [StokController::class, 'show']);           // menampilkan detail stok
        // Route::get('/{id}/edit', [StokController::class, 'edit']);     // menampilkan halaman form edit stok
        // Route::put('/{id}', [StokController::class, 'update']);         // menyiapkan perubahan data stok
        // Route::delete('/{id}', [StokController::class, 'destroy']);     // menghapus data stok
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/level', [LevelController::class, 'index']);
// Route::get('/kategori', [KategoriController::class, 'index']);
// Route::get('/user', [UserController::class, 'index']);

// Route::get('/user/tambah', [UserController::class, 'tambah']);
// Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);
// Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
// Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
// Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);

// Route::get('/', [WelcomeController::class, 'index']);
