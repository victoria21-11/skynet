<?php

use Illuminate\Database\Seeder;
use App\Models\{
    AntivirusType,
    Antivirus,
    PeriodType,
    AntivirusPeriod
};

class AntivirusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $periodID = PeriodType::ofName('month')->first()->id;
        $data = [
            [
                'title' => 'ESET',
                'preview_description' => 'Продукты ESET являются обладателями большого количества наград и сертификатов',
                'description' => 'Уникальная система мультилицензирования ESET – одна лицензия ESET NOD32 позволяет пользователю защитить все операционные системы, установленные на одном компьютере: Windows, MAC OS X, Linux. Награда команды SkyNet за первое место в конкурсе от компании ESET NOD32 «Позвони мне, позвони!». Вы можете выбрать один из предложенных продуктов ESET: "Антивирус ESET NOD32" или комплексное решение "ESET NOD32 Smart Security". Лицензия на любой из представленных продуктов позволяет активировать лицензионный ключ на трех разных компьютерах (ноутбуках) вашей семьи. Подключившись к услуге, Вы получаете качественный и надежный продукт, а также своевременные обновления вирусных баз и профессиональную, круглосуточную техническую поддержку компании ESET. Также, на сайте ESETNOD32 находится исчерпывающая документация по продуктам компании ESET. По вопросам технической поддержки продуктов ESET Вы можете обратиться по следующему бесплатному телефонному номеру 8 (800) 200-01-57, а также по электронной почте на адрес support@esetnod32.ru.',
                'antiviruses' => [
                    [
                        'title' => 'Антивирус',
                        'periods' => [
                            [
                                'period' => 1,
                                'price' => 89,
                                'period_type_id' => $periodID,
                            ],
                            [
                                'period' => 12,
                                'price' => 890,
                                'period_type_id' => $periodID,
                            ]
                        ]
                    ],
                    [
                        'title' => 'Smart Security',
                        'periods' => [
                            [
                                'period' => 1,
                                'price' => 139,
                                'period_type_id' => $periodID,
                            ],
                            [
                                'period' => 12,
                                'price' => 1390,
                                'period_type_id' => $periodID,
                            ]
                        ]
                    ]
                ]
            ],
            [
                'title' => 'Dr.WEB',
                'preview_description' => 'Популярный антивирус по лучшей цене',
                'description' => 'Популярный антивирус по лучшей цене Антивирусные продукты Dr.Web обеспечат всем членам семьи безопасное пользование Интернетом. Благодаря установленному ПО вы сможете без операционных задержек проводить в мировой Паутине сколько угодно времени, не боясь проникновения в компьютер вирусов, троянских программ, руткитов, хакерских утилит, шпионского и рекламного ПО, а также оградить ваших детей от нежелательного контента.',
                'antiviruses' => [
                    [
                        'title' => 'Dr. Web Премиум',
                        'periods' => [
                            [
                                'period' => 1,
                                'price' => 89,
                                'period_type_id' => $periodID,
                            ],
                        ]
                    ],
                    [
                        'title' => 'Dr. Web Классик',
                        'periods' => [
                            [
                                'period' => 1,
                                'price' => 79,
                                'period_type_id' => $periodID,
                            ],
                        ]
                    ],
                ]
            ],
            [
                'title' => 'PANDA',
                'preview_description' => 'PandaLabs является одной из самых авторитетных лабораторий в мире с высокой скоростью реакции',
                'description' => 'Антивирусная лаборатория PandaLabs является одной из самых авторитетных лабораторий в мире с высокой скоростью реакции на появление новых угроз.Многие разработки Panda Security стали стандартами для антивирусных продуктов - проактивная защита от неизвестных угроз, ежедневные автоматические обновления, технологии Коллективного разума. Отличительная особенность продуктов Panda - наличие технологий Коллективного разума, которые позволяют: автоматически в режиме реального времени проверять подозрительные файлы с неизвестными угрозами непосредственно в антивирусной лаборатории PandaLabs, а в случае угрозы мгновенно применять алгоритмы лечения. использовать всю базу знаний PandaLabs для оперативной блокировки скрытых угроз даже до того момента, как они начнут осуществлять свои вредоносные действия. Наличие простого и интуитивно понятного интерфейса на русском языке с автоматической работой всех основных модулей позволяет вам просто и быстро начать использовать продукты Panda, не беспокоясь о своей безопасности.',
                'antiviruses' => [
                    [
                        'title' => 'Global Protection',
                        'periods' => [
                            [
                                'period' => 1,
                                'price' => 130,
                                'period_type_id' => $periodID,
                            ],
                        ]
                    ],
                    [
                        'title' => 'Antivirus Pro',
                        'periods' => [
                            [
                                'period' => 1,
                                'price' => 79,
                                'period_type_id' => $periodID,
                            ],
                        ]
                    ],
                    [
                        'title' => 'Internet Security',
                        'periods' => [
                            [
                                'period' => 1,
                                'price' => 99,
                                'period_type_id' => $periodID,
                            ],
                        ]
                    ],
                ]
            ]
        ];
        foreach ($data as $value) {
            $type = factory(AntivirusType::class)->create([
                'title' => $value['title'],
                'preview_description' => $value['preview_description'],
                'description' => $value['description'],
            ]);
            foreach ($value['antiviruses'] as $antivirus) {
                $savedAntivirus = $type->antiviruses()
                ->save(factory(Antivirus::class)->make([
                    'title' => $antivirus['title']
                ]));
                foreach ($antivirus['periods'] as $period) {
                    $savedAntivirus->periods()
                    ->save(factory(AntivirusPeriod::class)->make([
                        'period' => $period['period'],
                        'price' => $period['price'],
                        'period_type_id' => $period['period_type_id'],
                    ]));
                }
            }
        }
    }
}
