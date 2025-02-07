<?php
namespace Database\Seeders;

use App\Models\ClassType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MyClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('my_classes')->delete();
        $ct = ClassType::pluck('id')->all();

        $data = [
            ['name' => 'Kelas 7', 'class_type_id' => $ct[0]],
            ['name' => 'Kelas 8', 'class_type_id' => $ct[0]],
            ['name' => 'Kelas 9', 'class_type_id' => $ct[0]],
            ['name' => 'Kelas 10', 'class_type_id' => $ct[1]],
            ['name' => 'Kelas 11', 'class_type_id' => $ct[1]],
            ['name' => 'Kelas 12', 'class_type_id' => $ct[1]],

            ];

        DB::table('my_classes')->insert($data);

    }
}
