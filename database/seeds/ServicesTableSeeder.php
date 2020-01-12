<?php

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServicesTableSeeder extends Seeder
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
                'title' => 'Подключи друга — получи бонус!',
                'preview_description' => 'Подключите своего друга к SkyNet и получите 500 рублей на счёт. Больше друзей – больше подарков!',
            ],
            [
                'title' => 'Бонус за переход',
                'preview_description' => 'Получите бонус за переход от другого провайдера',
            ],
            [
                'title' => 'Мобильное приложение iOS',
                'preview_description' => 'Мобильное приложение SkyNet поможет вам полностью контролировать все ваши услуги',
            ],
            [
                'title' => 'Оповещения в Telegram',
                'preview_description' => 'SkyNet Bot будет вашим верным информатором',
            ],
            [
                'title' => 'Контроль времени',
                'preview_description' => 'Услуга позволяет устанавливать временные ограничения доступа в интернет и локальную сеть',
            ],
            [
                'title' => 'DNS-хостинг',
                'preview_description' => 'Удобный и надежный DNS-хостинг от SkyNet',
            ],
            [
                'title' => 'SMS-чек',
                'preview_description' => 'Оперативное информирование о зачислении платежа на абонентский счет',
            ],
            [
                'title' => 'Доменное имя',
                'preview_description' => 'Доменное имя',
            ],
        ];

        foreach ($data as $value) {
            factory(Service::class)->create(array_merge($value, [
                'url' => '/'
            ]));
        }
    }
}
