<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StreetsTableSeeder::class);
        $this->call(TariffsTableSeeder::class);
        $this->call(TreesTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(JobopeningsTableSeeder::class);
        $this->call(AntivirusesTableSeeder::class);
        $this->call(EquipmentsTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(DocumentsTableSeeder::class);
        $this->call(PaymentMethodsTableSeeder::class);
    }
}
