<?php

use Illuminate\Database\Seeder;
use App\Models\{
    NavigationType,
    Navigation,
    Post,
    NavparentNavchild
};

class NavigationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $footer = factory(NavigationType::class)->create([
            'title' => 'footer'
        ]);

        $header = factory(NavigationType::class)->create([
            'title' => 'header'
        ]);

        $data = [
            [
                'title' => 'Тарифы',
                'url' => 'tariffs',
                'header' => false,
                'footer' => false,
                'children' => [],
                'posts' => [],
                'view' => 'tariffs.index'
            ],
            [
                'title' => 'Обрудование',
                'url' => 'equipments',
                'header' => false,
                'footer' => false,
                'children' => [],
                'posts' => []
            ],
            [
                'title' => 'Антивирусная защита',
                'url' => 'antiviruses',
                'header' => false,
                'footer' => false,
                'children' => [],
                'posts' => []
            ],
            [
                'title' => 'Дополнительные сервисы',
                'url' => 'services',
                'header' => false,
                'footer' => false,
                'children' => [],
                'posts' => []
            ],
            [
                'title' => 'Пакеты ТВ',
                'url' => 'packages',
                'header' => false,
                'footer' => false,
                'children' => [],
                'posts' => []
            ],
            [
                'title' => 'Как смотреть ТВ',
                'url' => 'watch_tv',
                'header' => false,
                'footer' => false,
                'children' => [],
                'posts' => [
                    [
                        'title' => 'На мониторе компьютера',
                    ],
                    [
                        'title' => 'С ТВ-приставкой TVIP',
                    ],
                    [
                        'title' => 'На медиаплеерах Dune HD',
                    ],
                    [
                        'title' => 'На Samsung Smart TV',
                    ],
                    [
                        'title' => 'На устройствах с ОС Android',
                    ],
                    [
                        'title' => 'На устройствах с ОС iOS',
                    ],
                    [
                        'title' => 'На LG Smart TV',
                    ],
                    [
                        'title' => 'На устройствах с ОС BlackBerry',
                    ],
                ]
            ],
            [
                'title' => 'Онлайн оплата',
                'url' => 'online_payment',
                'header' => false,
                'footer' => false,
                'children' => [],
                'posts' => []
            ],
            [
                'title' => 'Другие способы оплаты',
                'url' => 'other_payment_methods',
                'header' => false,
                'footer' => false,
                'children' => [],
                'posts' => []
            ],
            [
                'title' => 'Автоплатеж',
                'url' => 'autopayment',
                'header' => false,
                'footer' => false,
                'children' => [],
                'posts' => []
            ],
            [
                'title' => 'Отложенный платеж',
                'url' => 'deferred_payment',
                'header' => false,
                'footer' => false,
                'children' => [],
                'posts' => []
            ],
            [
                'title' => 'Онлайн консультант',
                'url' => 'online_consultant',
                'header' => false,
                'footer' => false,
                'children' => [],
                'posts' => []
            ],
            [
                'title' => 'Центры обслуживания',
                'url' => 'service_centers',
                'header' => false,
                'footer' => false,
                'children' => [],
                'posts' => []
            ],
            [
                'title' => 'Частые вопросы',
                'url' => 'faq',
                'header' => false,
                'footer' => false,
                'children' => [],
                'posts' => []
            ],
            [
                'title' => 'Форум',
                'url' => 'forum',
                'header' => false,
                'footer' => false,
                'children' => [],
                'posts' => []
            ],
            [
                'title' => 'Получить работу',
                'url' => 'get_job',
                'header' => false,
                'footer' => false,
                'children' => [],
                'posts' => []
            ],
            [
                'title' => 'Корпоративная культура',
                'url' => 'corporate_culture',
                'header' => false,
                'footer' => false,
                'children' => [],
                'posts' => []
            ],
            [
                'title' => 'Истории успеха',
                'url' => 'success_stories',
                'header' => false,
                'footer' => false,
                'children' => [],
                'posts' => []
            ],
            [
                'title' => 'Стать дилером',
                'url' => 'become_dealer',
                'header' => false,
                'footer' => false,
                'children' => [],
                'posts' => []
            ],
            [
                'title' => 'Стать партнером',
                'url' => 'become_partner',
                'header' => false,
                'footer' => false,
                'children' => [],
                'posts' => []
            ],
            [
                'title' => 'О компании',
                'url' => 'about',
                'header' => true,
                'footer' => true,
                'children' => [
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
                        'children' => [
                            [
                                'url' => 'get_job',
                            ],
                            [
                                'url' => 'corporate_culture',
                            ],
                            [
                                'url' => 'success_stories',
                            ],
                        ]
                    ],
                    [
                        'title' => 'Контакты',
                        'url' => 'contacts',
                    ],
                    [
                        'title' => 'Документация',
                        'url' => 'documents',
                    ],
                    [
                        'title' => 'Партнерам',
                        'url' => 'partnership',
                        'children' => [
                            [
                                'url' => 'become_dealer',
                            ],
                            [
                                'url' => 'become_partner',
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
                'header' => true,
                'footer' => true,
                'children' => [
                    [
                        'title' => 'Интернет',
                        'url' => 'internet',
                        'view' => 'tariffs.with_articles',
                        'description' => 'В данном разделе вы сможете выбрать тариф на высокоскоростной интернет. Для подробного ознакомления с возможностями каждого тарифа — перейдите на его страницу. Все тарифы предоставят вам быстрый и безлимитный интернет. Также вы можете оставить он-лайн заявку на подключение.',
                        'children' => [
                            [
                                'url' => 'tariffs',
                            ],
                            [
                                'url' => 'watch_tv',
                            ],
                            [
                                'url' => 'equipments',
                            ],
                            [
                                'url' => 'antiviruses',
                            ],
                            [
                                'url' => 'services',
                            ]
                        ]
                    ],
                    [
                        'title' => 'Цифровое ТВ',
                        'url' => 'tv',
                        'view' => 'tariffs.index',
                        'children' => [
                            [
                                'url' => 'tariffs',
                            ],
                            [
                                'url' => 'packages',
                            ],
                            [
                                'url' => 'watch_tv',
                            ],
                        ]
                    ],
                    [
                        'title' => 'SkyNet WiFi',
                        'url' => 'wifi',
                        'view' => 'front.navigations.wifi',
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
                        'children' => [
                            [
                                'url' => 'online_payment',
                            ],
                            [
                                'url' => 'other_payment_methods',
                            ],
                            [
                                'url' => 'autopayment',
                            ],
                            [
                                'url' => 'deferred_payment',
                            ],
                        ]
                    ],
                    [
                        'title' => 'Контакты',
                        'url' => 'contacts',
                        'children' => [
                            [
                                'url' => 'online_consultant'
                            ],
                            [
                                'url' => 'service_centers'
                            ],
                            [
                                'url' => 'faq'
                            ],
                            [
                                'url' => 'forum'
                            ],
                        ]
                    ],
                ]
            ],
            [
                'title' => 'Для бизнеса',
                'url' => 'business',
                'header' => true,
                'footer' => true,
                'children' => [
                    [
                        'title' => 'Интернет',
                        'url' => 'internet',
                        'view' => 'front.navigations.business',
                    ],
                    [
                        'title' => 'Телефония',
                        'url' => 'telephony',
                        'view' => 'front.navigations.business',
                    ],
                    [
                        'title' => 'Телевидение',
                        'url' => 'tv',
                        'view' => 'front.navigations.business',
                    ],
                    [
                        'title' => 'Видеонаблюдение',
                        'url' => 'video_monitoring',
                        'view' => 'front.navigations.business',
                    ],
                    [
                        'title' => 'Хотспоты',
                        'url' => 'hotspot',
                        'view' => 'front.navigations.business',
                    ],
                    [
                        'title' => 'Операторам',
                        'url' => 'operators',
                        'view' => 'front.navigations.business',
                    ],
                    [
                        'title' => 'Контакты',
                        'url' => 'contacts',
                    ],
                ]
            ],
        ];
        foreach ($data as $value) {
            $parent = factory(Navigation::class)->create([
                'title' => $value['title'],
                'url' => $value['url'],
                'view' => $value['view'] ?? 'front.navigations.index',
            ]);
            if($value['footer']) {
                $footer->navigations()->attach($parent->id);
            }
            if($value['header']) {
                $header->navigations()->attach($parent->id);
            }
            foreach ($value['posts'] ?? [] as $post) {
                $parent->posts()->save(factory(Post::class)->make($post));
            }
            $this->saveChildren($value, $parent);
        }
    }

    public function saveChildren($parent, $savedParent, $itsParent = null)
    {
        $url = $savedParent->url;
        if($itsParent) {
            $url = NavparentNavchild::where('parent_id', $itsParent->id)
            ->where('child_id', $savedParent->id)->first()->url ?? false;
        }
        $itsParent = $savedParent;
        foreach ($parent['children'] ?? [] as $child) {
            if(isset($child['title'])) {
                $savedChild = factory(Navigation::class)->create([
                    'title' => $child['title'],
                    'url' => $child['url'],
                    'view' => $child['view'] ?? 'front.navigations.index',
                    'description' => $child['description'] ?? '',
                ]);
            } else {
                $savedChild = Navigation::ofUrl($child['url'])->first();
            }
            $savedParent->children()->attach($savedChild->id, [
                'url' => "$url/$savedChild->url"
            ]);
            $this->saveChildren($child, $savedChild, $itsParent);
        }
    }
}
