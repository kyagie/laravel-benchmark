<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $chunkSize = 1000;
        $totalRecords = 10_000_000;
        $chunks = intdiv($totalRecords, $chunkSize);

        for ($i = 0; $i < $chunks; $i++) {
            $data = [];
            for ($j = 0; $j < $chunkSize; $j++) {
                $data[] = [
                    'name' => 'Person ' . ($i * $chunkSize + $j),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            DB::table('people')->insert($data);
        }
    }
}
