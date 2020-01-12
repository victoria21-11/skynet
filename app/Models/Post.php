<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Post extends Model
{


    protected $fillable = [
        'published',
        'title',
        'description',
        'navigation_id',
    ];

    public function navigation()
    {
        return $this->belongsTo(Navigation::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function getIsMyLikeExistsAttribute()
    {
        return Like::isExists(request()->ip(), $this->id, self::class);
    }

    public function getClassName()
    {
        return quotemeta(self::class);
    }
}
