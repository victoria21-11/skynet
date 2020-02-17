<?php

namespace App\Models;

class Like extends Model
{

    public function commentable()
    {
        return $this->morphTo();
    }

    public function scopeOfIP($query, $ip)
    {
        return $query->where('ip', $ip);
    }

    public function scopeCurrentIP($query)
    {
        return $query->where('ip', request()->ip());
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
