<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Alat Tulis',
                'description' => 'Produk berupa alat tulis kantor',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Elektronik Kantor',
                'description' => 'Produk elektronik untuk keperluan kantor',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Perlengkapan Kerja',
                'description' => 'Produk perlengkapan kerja sehari-hari',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Furniture Kantor',
                'description' => 'Meja, kursi, dan peralatan kantor lainnya',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'ATK Murah',
                'description' => 'Alat tulis dengan harga terjangkau',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Insert data ke tabel product_category
        $this->db->table('product_category')->insertBatch($data);

        echo "Data kategori produk berhasil ditambahkan.\n";
    }
}