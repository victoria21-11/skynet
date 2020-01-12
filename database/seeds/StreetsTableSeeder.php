<?php

use Illuminate\Database\Seeder;
use App\Models\{
    Street,
    House
};

class StreetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Street::class, 50)->create()->each(function ($street) {
            $street->houses()->save(factory(House::class)->make());
        });
    }
}
