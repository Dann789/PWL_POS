<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'supplier_id' => 1,
                'supplier_kode' => 'SPL01',
                'supplier_nama' => 'PT Segar Jaya',
                'supplier_alamat' => 'Jl. Merdeka No. 123, Jakarta'
            ],
            [
                'supplier_id' => 2,
                'supplier_kode' => 'SPL02',
                'supplier_nama' => 'CV. Maju Makmur',
                'supplier_alamat' => 'Jl. Melati No. 45, Bandung'
            ],
            [
                'supplier_id' => 3,
                'supplier_kode' => 'SPL03',
                'supplier_nama' => 'PT Prima Abadi',
                'supplier_alamat' => 'Jl. Kamboja No. 5, Semarang'
            ],
        ];
        DB::table('m_supplier')->insert($data);
    }
}
