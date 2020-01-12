<?php

use Illuminate\Database\Seeder;
use App\Models\Jobopening;

class JobopeningsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Jobopening::class, 20)->create();
    }
}
