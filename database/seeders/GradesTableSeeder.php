<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('grades')->delete();

        $this->createGrades();
    }
    protected function createGrades()
    {

        $d = [

            ['name' => 'A', 'mark_from' => 90, 'mark_to' => 100, 'remark' => 'Sangat Baik'],
            ['name' => 'B', 'mark_from' => 83, 'mark_to' => 89, 'remark' => 'Baik'],
            ['name' => 'C', 'mark_from' => 75, 'mark_to' => 82, 'remark' => 'Cukup'],
            ['name' => 'D', 'mark_from' => 0, 'mark_to' => 74, 'remark' => 'Kurang'],
        ];
        DB::table('grades')->insert($d);
    }
}
