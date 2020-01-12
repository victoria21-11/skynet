<?php

use Illuminate\Database\Seeder;
use App\Models\{
    TariffGroup,
    PeriodType,
    TariffType,
    Tariff,
    Package,
    Telephone,
};

class TariffsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $period = factory(PeriodType::class)->create([
            'title' => 'Месяц',
            'name' => 'month',
        ]);
        $tariffTypeTV = factory(TariffType::class)->create([
            'title' => 'TV'
        ]);
        $tariffTypeInternet = factory(TariffType::class)->create([
            'title' => 'Internet'
        ]);
        $packages = [
            [
                'title' => 'ТВ пакет «Социальный»',
                'name' => 'social'
            ],
            [
                'title' => 'ТВ пакет «Базовый»',
                'name' => 'base'
            ],
            [
                'title' => 'Кино',
                'extra' => true,
                'price' => 80
            ],
            [
                'title' => 'Amedia Premium HD',
                'extra' => true,
                'price' => 199
            ],
            [
                'title' => 'Детский',
                'extra' => true,
                'price' => 149
            ],
            [
                'title' => 'Премиум Футбол',
                'extra' => true,
                'price' => 380
            ],
            [
                'title' => 'Матч Премьер',
                'extra' => true,
                'price' => 299
            ],
            [
                'title' => 'Дикий',
                'extra' => true,
                'price' => 99
            ],
            [
                'title' => 'СНГ',
                'extra' => true,
                'price' => 100
            ],
            [
                'title' => 'Стрим ТВ',
                'extra' => true,
                'price' => 60
            ],
            [
                'title' => 'Для взрослых',
                'extra' => true,
                'price' => 149
            ],
        ];
        $data = [
            [
                'title' => 'Хочу SkyNet',
                'tariff_type_id' => $tariffTypeInternet->id,
                'rebate' => true,
                'tariffs' => [
                    [
                        'title' => 'Хочу SkyNet',
                        'period' => '4',
                        'price' => 1000,
                        'rebate' => true,
                        'period_type_id' => $period->id,
                    ]
                ],
                'packages' => [
                    'social',
                ]
            ],
            [
                'title' => 'Хороший год',
                'tariff_type_id' => $tariffTypeInternet->id,
                'rebate' => true,
                'tariffs' => [
                    [
                        'title' => 'Хороший год',
                        'period' => 12,
                        'price' => 492,
                        'rebate' => true,
                        'period_type_id' => $period->id,
                    ]
                ],
                'packages' => [
                    'social',
                ]
            ],
            [
                'title' => 'Земля',
                'tariff_type_id' => $tariffTypeInternet->id,
                'tariffs' => [
                    [
                        'title' => 'Земля',
                        'period' => 1,
                        'price' => 550,
                        'period_type_id' => $period->id,
                        'rebate' => false
                    ],
                    [
                        'title' => 'Земля',
                        'period' => 3,
                        'price' => 1500,
                        'period_type_id' => $period->id,
                        'rebate' => false
                    ],
                    [
                        'title' => 'Земля',
                        'period' => 6,
                        'price' => 2820,
                        'period_type_id' => $period->id,
                        'rebate' => false
                    ],
                    [
                        'title' => 'Земля',
                        'period' => 12,
                        'price' => 4800,
                        'period_type_id' => $period->id,
                        'rebate' => false
                    ]
                ]
            ],
            [
                'title' => 'Вода',
                'tariff_type_id' => $tariffTypeInternet->id,
                'tariffs' => [
                    [
                        'title' => 'Вода',
                        'period' => 1,
                        'price' => 600,
                        'period_type_id' => $period->id,
                        'rebate' => false
                    ],
                    [
                        'title' => 'Вода',
                        'period' => 3,
                        'price' => 1650,
                        'period_type_id' => $period->id,
                        'rebate' => false
                    ],
                    [
                        'title' => 'Вода',
                        'period' => 6,
                        'price' => 3060,
                        'period_type_id' => $period->id,
                        'rebate' => false
                    ],
                    [
                        'title' => 'Вода',
                        'period' => 12,
                        'price' => 5400,
                        'period_type_id' => $period->id,
                        'rebate' => false
                    ]
                ],
                'packages' => [
                    'social',
                ]
            ],
            [
                'title' => 'Огонь',
                'tariff_type_id' => $tariffTypeInternet->id,
                'tariffs' => [
                    [
                        'title' => 'Огонь',
                        'period' => 1,
                        'price' => 800,
                        'period_type_id' => $period->id,
                        'rebate' => false
                    ],
                    [
                        'title' => 'Огонь',
                        'period' => 3,
                        'price' => 2250,
                        'period_type_id' => $period->id,
                        'rebate' => false
                    ],
                    [
                        'title' => 'Огонь',
                        'period' => 6,
                        'price' => 4260,
                        'period_type_id' => $period->id,
                        'rebate' => false
                    ],
                    [
                        'title' => 'Огонь',
                        'period' => 12,
                        'price' => 7800,
                        'period_type_id' => $period->id,
                        'rebate' => false
                    ]
                ],
                'packages' => [
                    'social',
                ]
            ],
            [
                'title' => 'T-400',
                'tariff_type_id' => $tariffTypeTV->id,
                'rebate' => true,
                'tariffs' => [
                    [
                        'title' => 'T-400',
                        'period' => 5,
                        'price' => 2000,
                        'rebate' => true,
                        'period_type_id' => $period->id,
                    ]
                ],
                'packages' => [
                    'base',
                ]
            ],
            [
                'title' => 'Вода HD',
                'tariff_type_id' => $tariffTypeTV->id,
                'tariffs' => [
                    [
                        'title' => 'Вода HD',
                        'period' => 1,
                        'price' => 800,
                        'period_type_id' => $period->id,
                        'rebate' => false
                    ],
                    [
                        'title' => 'Вода HD',
                        'period' => 3,
                        'price' => 2250,
                        'period_type_id' => $period->id,
                        'rebate' => false
                    ],
                    [
                        'title' => 'Вода HD',
                        'period' => 6,
                        'price' => 4260,
                        'period_type_id' => $period->id,
                        'rebate' => false
                    ],
                    [
                        'title' => 'Вода HD',
                        'period' => 12,
                        'price' => 7800,
                        'period_type_id' => $period->id,
                        'rebate' => false
                    ]
                ],
                'packages' => [
                    'base',
                ]
            ],
            [
                'title' => 'Огонь HD',
                'tariff_type_id' => $tariffTypeTV->id,
                'tariffs' => [
                    [
                        'title' => 'Огонь HD',
                        'period' => 1,
                        'price' => 1000,
                        'period_type_id' => $period->id,
                        'rebate' => false
                    ],
                    [
                        'title' => 'Огонь HD',
                        'period' => 3,
                        'price' => 2820,
                        'period_type_id' => $period->id,
                        'rebate' => false
                    ],
                    [
                        'title' => 'Огонь HD',
                        'period' => 6,
                        'price' => 5160,
                        'period_type_id' => $period->id,
                        'rebate' => false
                    ],
                    [
                        'title' => 'Огонь HD',
                        'period' => 12,
                        'price' => 9600,
                        'period_type_id' => $period->id,
                        'rebate' => false
                    ]
                ],
                'packages' => [
                    'base',
                ]
            ]
        ];

        foreach ($packages as $value) {
            factory(Package::class)->create($value);
        }

        foreach ($data as $value) {
            $tariffGroup = factory(TariffGroup::class)->create([
                'title' => $value['title'],
                'rebate' => $value['rebate'] ?? false,
                'tariff_type_id' => $value['tariff_type_id'],
            ]);
            foreach ($value['packages'] ?? [] as $package) {
                $package = Package::where('name', $package)->first();
                $tariffGroup->packages()->attach($package->id);
            }
            foreach ($value['tariffs'] as $tariff) {
                $tariffGroup->tariffs()->save(factory(Tariff::class)->make($tariff));
            }
        }

        $telephones = [
            [
                'title' => 'Повременный',
                'price_urban' => 0.54,
                'price_mobile' => 2.56,
                'price_landline' => 3000,
                'price' => 250,
            ],
            [
                'title' => 'Городской',
                'min_per_month' => 1000,
                'price_mobile' => 2.56,
                'price_landline' => 3000,
                'price' => 500,
            ]
        ];
        foreach ($telephones as $value) {
            factory(Telephone::class)->create($value);
        }

    }
}
