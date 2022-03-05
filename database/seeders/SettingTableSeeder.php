<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Settings;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         Settings::create([
            'name' => 'admin@gmail.com',
            'copyright'=>'copyright 2022',
        ]);
    }
}
