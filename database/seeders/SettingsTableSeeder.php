<?php
namespace Database\Seeders;

use App\Helpers\Qs;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();

        $data = [
            ['type' => 'current_session', 'description' => '2024-2025'],
            ['type' => 'system_title', 'description' => 'Hubbul Khoir'],
            ['type' => 'system_name', 'description' => 'Hubbul Khoir'],
            ['type' => 'term_ends', 'description' => '7/10/2025'],
            ['type' => 'term_begins', 'description' => '7/10/2024'],
            ['type' => 'phone', 'description' => '0123456789'],
            ['type' => 'address', 'description' => 'Sukoharjo'],
            ['type' => 'system_email', 'description' => 'hk@gmail.com'],
            // ['type' => 'alt_email', 'description' => ''],
            // ['type' => 'email_host', 'description' => ''],
            // ['type' => 'email_pass', 'description' => ''],
            ['type' => 'lock_exam', 'description' => 0],
            ['type' => 'logo', 'description' => ( Qs::getDefaultSystemImage())],
        ];

        DB::table('settings')->insert($data);

    }
}
