<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori_id' => 1,
                'kategori_kode' => 'MKA',
                'kategori_nama' => 'Makanan'
            ],
            [
                'kategori_id' => 2,
                'kategori_kode' => 'MNA',
                'kategori_nama' => 'Minuman'
            ],
            [
                'kategori_id' => 3,
                'kategori_kode' => 'ALT',
                'kategori_nama' => 'Alat Tulis'
            ],
            [
                'kategori_id' => 4,
                'kategori_kode' => 'KRT',
                'kategori_nama' => 'Kebutuhan Rumah Tangga'
            ],
            [
                'kategori_id' => 5,
                'kategori_kode' => 'OBT',
                'kategori_nama' => 'Obat-obatan'
            ],
        ];
        DB::table('m_kategori')->insert($data);
    }
}
