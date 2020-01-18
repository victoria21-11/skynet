<?php

namespace App\Models;

use App\Traits\LikeTrait;

class AntivirusType extends Model
{

    use LikeTrait;

    protected $scopes = [
        'title' => 'ofLike',
        'published' => 'ofBoolean',
        'preview_description' => 'ofLike',
    ];

    public function antiviruses()
    {
        return $this->hasMany(Antivirus::class);
    }

    public function getUrl()
    {
        return url('/home/internet/antiviruses/' . $this->id);
    }

    public function getMinPrice()
    {
        return $this->antiviruses->map(function($antivirus) {
            return $antivirus->getMinPrice();
        })->sort()->first();
    }
}
