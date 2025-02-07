<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UsersTableSeeder;
use Database\Seeders\GradesTableSeeder;
use Database\Seeders\SectionsTableSeeder;
use Database\Seeders\SettingsTableSeeder;
use Database\Seeders\MyClassesTableSeeder;
use Database\Seeders\UserTypesTableSeeder;
use Database\Seeders\ClassTypesTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ClassTypesTableSeeder::class);
        $this->call(GradesTableSeeder::class);
        $this->call(MyClassesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(UserTypesTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(SectionsTableSeeder::class);
        $this->call(SkillsTableSeeder::class);
             
    }
}
