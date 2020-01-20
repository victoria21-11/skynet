<?php

use Illuminate\Database\Seeder;
use App\Models\GlobalSetting;

class GlobalSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(GlobalSetting::class)->create([
            'title' => 'new_year',
            'name' => 'new_year',
            'value' => '0',
        ]);
    }
}
