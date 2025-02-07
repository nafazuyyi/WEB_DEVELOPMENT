<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClassTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('class_types')->delete();

        $data = [
            ['name' => 'Sekolah Menengah Pertama', 'code' => 'SMP'],
            ['name' => 'Sekolah Menengah Atas', 'code' => 'SMA'],
        ];

        DB::table('class_types')->insert($data);
    }
}
