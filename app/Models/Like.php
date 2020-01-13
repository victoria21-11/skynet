<?php

namespace App\Models;



class Like extends Model
{


    protected $fillable = [
        'likeable_type',
        'likeable_id',
        'ip',
    ];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function scopeOfIP($query, $ip)
    {
        return $query->where('ip', $ip);
    }

    public function scopeOfLikableType($query, $likeableType)
    {
        return $query->where('likeable_type', $likeableType);
    }

    public function scopeOfLikableID($query, $likeableID)
    {
        return $query->where('likeable_id', $likeableID);
    }

    static function isExists($ip, $likeableID, $likeableType)
    {
        return self::ofIP($ip)
        ->ofLikableType($likeableType)
        ->ofLikableID($likeableID)
        ->exists();
    }

}
