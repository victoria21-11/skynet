<?php

use Illuminate\Database\Seeder;
use App\Models\{
    Post,
    Tree,
    Section,
};

class TreesTableSeeder extends Seeder
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
                'title' => 'О компании',
                'url' => 'about',
                'sections' => [
                    [
                        'title' => 'О компании',
                        'url' => 'company',
                    ],
                    [
                        'title' => 'Новости',
                        'url' => 'news',
                    ],
                    [
                        'title' => 'Вакансии',
                        'url' => 'job_openings',
                        'sections' => [
                            [
                                'title' => 'Получить работу',
                                'url' => 'get_job',
                            ],
                            [
                                'title' => 'Корпоративная культура',
                                'url' => 'corporate_culture',
                            ],
                            [
                                'title' => 'Истории успеха',
                                'url' => 'success_stories',
                            ],
                        ]
                    ],
                    [
                        'title' => 'Контакты',
                        'url' => 'contacts',
                        'view' => 'front.trees.about_contacts',
                    ],
                    [
                        'title' => 'Документация',
                        'url' => 'documents',
                    ],
                    [
                        'title' => 'Партнерам',
                        'url' => 'partnership',
                        'sections' => [
                            [
                                'title' => 'Стать Дилером',
                                'url' => 'become_dealer',
                                'view' => 'front.partnership.dealer',
                            ],
                            [
                                'title' => 'Стать Партнером',
                                'url' => 'become_partner',
                                'view' => 'front.partnership.partner',
                            ],
                        ]
                    ],
                    [
                        'title' => 'Архив тарифов',
                        'url' => 'archive',
                    ],
                ]
            ],
            [
                'title' => 'Для дома',
                'url' => 'home',
                'sections' => [
                    [
                        'title' => 'Интернет',
                        'url' => 'internet',
                        'sections' => [
                            [
                                'title' => 'Тарифы',
                                'url' => 'tariffs',
                            ],
                            [
                                'title' => 'Как смотреть ТВ',
                                'url' => 'watch_tv',
                            ],
                            [
                                'title' => 'Обрудование',
                                'url' => 'equipments',
                            ],
                            [
                                'title' => 'Антивирусная защита',
                                'url' => 'antiviruses',
                            ],
                            [
                                'title' => 'Дополнительные сервисы',
                                'url' => 'services',
                            ]
                        ]
                    ],
                    [
                        'title' => 'Цифровое ТВ',
                        'url' => 'tv',
                        'sections' => [
                            [
                                'title' => 'Тарифы',
                                'url' => 'tariffs',
                            ],
                            [
                                'title' => 'Пакеты ТВ',
                                'url' => 'packages',
                            ],
                            [
                                'title' => 'Как смотреть ТВ',
                                'url' => 'watch_tv',
                            ],
                        ]
                    ],
                    [
                        'title' => 'SkyNet WiFi',
                        'url' => 'wifi',
                    ],
                    [
                        'title' => 'Телефония',
                        'url' => 'telephony',
                    ],
                    [
                        'title' => 'Подключиться',
                        'url' => 'connect',
                    ],
                    [
                        'title' => 'Оплата',
                        'url' => 'payment',
                        'sections' => [
                            [
                                'title' => 'Онлайн оплата',
                                'url' => 'online_payment',
                            ],
                            [
                                'title' => 'Другие способы оплаты',
                                'url' => 'other_payment_methods',
                            ],
                            [
                                'title' => 'Автоплатеж',
                                'url' => 'autopayment',
                            ],
                            [
                                'title' => 'Отложенный платеж',
                                'url' => 'deferred_payment',
                            ],
                        ]
                    ],
                    [
                        'title' => 'Контакты',
                        'url' => 'contacts',
                        'sections' => [
                            [
                                'title' => 'Онлайн консультант',
                                'url' => 'online_consultant',
                            ],
                            [
                                'title' => 'Центры обслуживания',
                                'url' => 'service_centers',
                            ],
                            [
                                'title' => 'Частые вопросы',
                                'url' => 'faq',
                            ],
                            [
                                'title' => 'Форум',
                                'url' => 'forum',
                            ],
                        ]
                    ],
                ]
            ],
            [
                'title' => 'Для бизнеса',
                'url' => 'business',
                'sections' => [
                    [
                        'title' => 'Интернет',
                        'url' => 'internet',
                        'view' => 'front.trees.business',
                    ],
                    [
                        'title' => 'Телефония',
                        'url' => 'telephony',
                        'view' => 'front.trees.business',
                    ],
                    [
                        'title' => 'Телевидение',
                        'url' => 'tv',
                        'view' => 'front.trees.business',
                    ],
                    [
                        'title' => 'Видеонаблюдение',
                        'url' => 'video_monitoring',
                        'view' => 'front.trees.business',
                    ],
                    [
                        'title' => 'Хотспоты',
                        'url' => 'hotspot',
                        'view' => 'front.trees.business',
                    ],
                    [
                        'title' => 'Операторам',
                        'url' => 'operators',
                        'view' => 'front.trees.business',
                    ],
                    [
                        'title' => 'Контакты',
                        'url' => 'contacts',
                        'view' => 'front.trees.about_contacts',
                    ],
                ]
            ]
        ];

        $tree = null;

        foreach ($data as $category) {
            $savedSection = Section::create([
                'title' => $category['title'],
                'url' => $category['url'],
                'view' => $section['view'] ?? 'front.trees.index',
            ]);
            $tree = Tree::create([
                'section_id' => $savedSection->id,
                'url' => $savedSection->url,
            ]);
            $this->buildTree($category['sections'] ?? [], $tree);
        }

    }

    public function buildTree($sections, $tree)
    {
        foreach ($sections ?? [] as $section) {
            $savedSection = Section::create([
                'title' => $section['title'],
                'url' => $section['url'],
                'view' => $section['view'] ?? 'front.trees.index',
            ]);
            $savedTree = Tree::create([
                'section_id' => $savedSection->id,
                'tree_id' => $tree->id,
                'url' => $tree->url . '/' . $savedSection->url,
            ]);
            if(isset($section['sections']) && !empty($section['sections'])) {
                $this->buildTree($section['sections'] ?? [], $savedTree);
            }
        }

    }
}
