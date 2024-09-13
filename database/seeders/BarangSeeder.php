<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'barang_id' => 1,
                'kategori_id' => 1,
                'barang_kode' => 'IDM01',
                'barang_nama' => 'Indomie Kuah Ayam Bawang',
                'harga_beli' => '3000',
                'harga_jual' => '3500',
            ],
            [
                'barang_id' => 2,
                'kategori_id' => 2,
                'barang_kode' => 'ULT01',
                'barang_nama' => 'Ultra Milk Chocolate',
                'harga_beli' => '8000',
                'harga_jual' => '8200',
            ],
            [
                'barang_id' => 3,
                'kategori_id' => 3,
                'barang_kode' => 'PGR01',
                'barang_nama' => 'Pensil Greebel 2B',
                'harga_beli' => '3500',
                'harga_jual' => '4000',
            ],
            [
                'barang_id' => 4,
                'kategori_id' => 4,
                'barang_kode' => 'SL01',
                'barang_nama' => 'Sunlight 650ml',
                'harga_beli' => '7500',
                'harga_jual' => '8000',
            ],
            [
                'barang_id' => 5,
                'kategori_id' => 5,
                'barang_kode' => 'TA01',
                'barang_nama' => 'Tolak Angin 250ml',
                'harga_beli' => '3900',
                'harga_jual' => '4000',
            ],
            [
                'barang_id' => 6,
                'kategori_id' => 1,
                'barang_kode' => 'IDM02',
                'barang_nama' => 'Indomie Mie Goreng',
                'harga_beli' => '3000',
                'harga_jual' => '3500',
            ],
            [
                'barang_id' => 7,
                'kategori_id' => 2,
                'barang_kode' => 'TBS01',
                'barang_nama' => 'Teh Botol Sosro 200ml',
                'harga_beli' => '3600',
                'harga_jual' => '4500',
            ],
            [
                'barang_id' => 8,
                'kategori_id' => 3,
                'barang_kode' => 'PK01',
                'barang_nama' => 'Penghapus Kotak',
                'harga_beli' => '2000',
                'harga_jual' => '2500',
            ],
            [
                'barang_id' => 9,
                'kategori_id' => 4,
                'barang_kode' => 'SML01',
                'barang_nama' => 'Sabun Mandi Lifebouy',
                'harga_beli' => '3100',
                'harga_jual' => '3700',
            ],
            [
                'barang_id' => 10,
                'kategori_id' => 5,
                'barang_kode' => 'PRC01',
                'barang_nama' => 'Paracetamol 500mg',
                'harga_beli' => '3100',
                'harga_jual' => '3300',
            ],
            [
                'barang_id' => 11,
                'kategori_id' => 1,
                'barang_kode' => 'BRK01',
                'barang_nama' => 'Biskuit Roma Kelapa 300gr',
                'harga_beli' => '11900',
                'harga_jual' => '12500',
            ],
            [
                'barang_id' => 12,
                'kategori_id' => 2,
                'barang_kode' => 'PS01',
                'barang_nama' => 'Pocari Sweat 350ml',
                'harga_beli' => '7300',
                'harga_jual' => '8000',
            ],
            [
                'barang_id' => 13,
                'kategori_id' => 3,
                'barang_kode' => 'P3C01',
                'barang_nama' => 'Penggaris 30cm',
                'harga_beli' => '5000',
                'harga_jual' => '5200',
            ],
            [
                'barang_id' => 14,
                'kategori_id' => 4,
                'barang_kode' => 'MG01',
                'barang_nama' => 'Minyak Goreng 500ml',
                'harga_beli' => '39600',
                'harga_jual' => '41000',
            ],
            [
                'barang_id' => 15,
                'kategori_id' => 5,
                'barang_kode' => 'MKP01',
                'barang_nama' => 'Minyak Kayu Putih 30ml',
                'harga_beli' => '15000',
                'harga_jual' => '17000',
            ],
        ];
        DB::table('m_barang')->insert($data);
    }
}
