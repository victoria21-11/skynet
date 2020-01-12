<?php

use Illuminate\Database\Seeder;
use App\Models\Equipment;

class EquipmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'title' => 'Wi-Fi Роутер D-Link DIR-615S',
                'price' => 1500,
            ],
            [
                'title' => 'Wi-Fi Роутер D-Link DIR-842/R',
                'price' => 1500,
            ],
            [
                'title' => 'Коммутатор TP-Link',
                'price' => 1000,
                'installment' => true,
                'installment_period' => 12,
            ]
        ];

        foreach ($data as $value) {
            factory(Equipment::class)->create($value);
        }
    }
}
