<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['title' => 'accountant', 'name' => 'Akuntan', 'level' => 5],
            // ['title' => 'parent', 'name' => 'Orang Tua', 'level' => 4],
            ['title' => 'teacher', 'name' => 'Guru', 'level' => 3],
            ['title' => 'admin', 'name' => 'Admin', 'level' => 2],
            ['title' => 'super_admin', 'name' => 'Super Admin', 'level' => 1],
        ];
        DB::table('user_types')->insert($data);
    }
}
