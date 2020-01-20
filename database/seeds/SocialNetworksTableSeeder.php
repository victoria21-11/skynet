<?php

use Illuminate\Database\Seeder;
use App\Models\SocialNetwork;

class SocialNetworksTableSeeder extends Seeder
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
                'title' => 'VK',
                'link' => 'https://vk.com/skynetgroup',
                'published' => true,
            ],
            [
                'title' => 'Instagram',
                'link' => 'https://www.instagram.com/sknt.ru/',
                'published' => true,
            ],
            [
                'title' => 'YouTube',
                'link' => 'https://www.youtube.com/channel/UCzzEyXpNzRFoPleACDgVxHg?view_as=subscriber',
                'published' => true,
            ],
            [
                'title' => 'Telegram',
                'link' => 'tg://resolve?domain=skntbot',
                'published' => true,
            ],
            [
                'title' => 'Twitter',
                'link' => 'http://twitter.com/sknt_ru',
                'published' => true,
            ],
            [
                'title' => 'Facebook',
                'link' => 'http://www.facebook.com/pages/SkyNet/114487521993465',
                'published' => true,
            ],
        ];
        foreach ($data as $value) {
            factory(SocialNetwork::class)->create($value);
        }
    }
}
