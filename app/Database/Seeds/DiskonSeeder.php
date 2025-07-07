<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DiskonSeeder extends Seeder
{
    public function run()
    {
        $data = [];
        $baseDate = new \DateTime('2025-06-25 06:01:35');

        for ($i = 0; $i < 10; $i++) {
            $tanggal = clone $baseDate;
            $tanggal->modify("+$i days");

            $data[] = [
                'tanggal'    => $tanggal->format('Y-m-d'),
                'nominal'    => 100000 - ($i * 5000),
                'created_at' => $baseDate->format('Y-m-d H:i:s'),
                'updated_at' => null,
            ];
        }

        $this->db->table('diskon')->insertBatch($data);
    }
}