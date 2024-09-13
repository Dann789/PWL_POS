<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'penjualan_id' => 1,
                'user_id' => 3,
                'pembeli' => 'Andi',
                'penjualan_kode' => 'PJL01',
                'penjualan_tanggal' => '2024-05-10 00:00:00', 
            ],
            [
                'penjualan_id' => 2,
                'user_id' => 3,
                'pembeli' => 'Adam',
                'penjualan_kode' => 'PJL02',
                'penjualan_tanggal' => '2024-05-11 00:00:00', 
            ],
            [
                'penjualan_id' => 3,
                'user_id' => 3,
                'pembeli' => 'Budi',
                'penjualan_kode' => 'PJL03',
                'penjualan_tanggal' => '2024-05-12 00:00:00', 
            ],
            [
                'penjualan_id' => 4,
                'user_id' => 3,
                'pembeli' => 'Bagus',
                'penjualan_kode' => 'PJL04',
                'penjualan_tanggal' => '2024-05-13 00:00:00', 
            ],
            [
                'penjualan_id' => 5,
                'user_id' => 3,
                'pembeli' => 'Chris',
                'penjualan_kode' => 'PJL05',
                'penjualan_tanggal' => '2024-05-14 00:00:00', 
            ],
            [
                'penjualan_id' => 6,
                'user_id' => 3,
                'pembeli' => 'Cindy',
                'penjualan_kode' => 'PJL06',
                'penjualan_tanggal' => '2024-05-15 00:00:00', 
            ],
            [
                'penjualan_id' => 7,
                'user_id' => 3,
                'pembeli' => 'Dony',
                'penjualan_kode' => 'PJL07',
                'penjualan_tanggal' => '2024-05-16 00:00:00', 
            ],
            [
                'penjualan_id' => 8,
                'user_id' => 3,
                'pembeli' => 'Haryo',
                'penjualan_kode' => 'PJL08',
                'penjualan_tanggal' => '2024-05-17 00:00:00', 
            ],
            [
                'penjualan_id' => 9,
                'user_id' => 3,
                'pembeli' => 'Satria',
                'penjualan_kode' => 'PJL09',
                'penjualan_tanggal' => '2024-05-18 00:00:00', 
            ],
            [
                'penjualan_id' => 10,
                'user_id' => 3,
                'pembeli' => 'Joko',
                'penjualan_kode' => 'PJL10',
                'penjualan_tanggal' => '2024-05-19 00:00:00', 
            ],
        ];
        DB::table('t_penjualan')->insert($data);
    }
}
