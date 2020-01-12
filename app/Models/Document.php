<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Document extends Model
{

    protected $fillable = [
        'published',
        'title',
        'description',
    ];

    public function getClassName()
    {
        return quotemeta(self::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function getIsMyLikeExistsAttribute()
    {
        return Like::isExists(request()->ip(), $this->id, self::class);
    }

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }
}
