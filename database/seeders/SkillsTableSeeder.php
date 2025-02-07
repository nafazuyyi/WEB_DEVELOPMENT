<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skills')->delete();

        $this->createSkills();
    }

    protected function createSkills()
    {

        $types = ['K', 'A', 'E']; // KETIDAKHADIRAN, ADAB, EKSTRAKULIKULER
        $d = [

            [ 'name' => 'SAKIT', 'skill_type' => $types[0] ],
            [ 'name' => 'IZIN', 'skill_type' => $types[0] ],
            [ 'name' => 'ALFA', 'skill_type' => $types[0] ],
            [ 'name' => 'AKHLAK', 'skill_type' => $types[1] ],
            [ 'name' => 'KEPRIBADIAN', 'skill_type' => $types[1] ],
            [ 'name' => 'HIDOROPONIK', 'skill_type' => $types[2] ],
            [ 'name' => 'BELADIRI', 'skill_type' => $types[2] ],
        ];
        DB::table('skills')->insert($d);
    }

}
