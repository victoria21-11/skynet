<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class Navigation extends Model
{

    public function children()
    {
        return $this->belongsToMany(Navigation::class, 'navparent_navchild', 'parent_id', 'child_id')
        ->withPivot('url');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function parents()
    {
        return $this->belongsToMany(Navigation::class, 'navparent_navchild', 'child_id', 'parent_id');
    }

    public function scopeOfUrl($query, $url)
    {
        return $query->where('navigations.url', $url);
    }

    public function scopeOnlyParent($query)
    {
        return $query->whereDoesntHave('parents');
    }

    public function scopeHeader($query)
    {
        return $query
        ->whereHas('types', function(Builder $query) {
            $query->where('id', NavigationType::header()->first()->id);
        });
    }

    public function scopeFooter($query)
    {
        return $query
        ->whereHas('types', function(Builder $query) {
            $query->where('id', NavigationType::footer()->first()->id);
        });
    }

    static function buildHeader()
    {
        return self::onlyParent()->header()->with('children')->get();
    }

    static function buildFooter()
    {
        return self::onlyParent()->footer()->with('children')->get();
    }

    public function types()
    {
        return $this->belongsToMany(NavigationType::class);
    }

    public function scopeOfChildrenPivotUrl($query, $url)
    {
        return self::whereHas('children', function($query) use ($url) {
            $query->where('navparent_navchild.url', $url);
        });
    }

    public function scopeOfParentsPivotUrl($query, $url)
    {
        return self::whereHas('parents', function($query) use ($url) {
            $query->where('navparent_navchild.url', $url);
        });
    }

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

    static function buildChildren()
    {
        $navigation = NavparentNavchild::ofUrl(request()->path())->first();
        if($navigation) {
            $navigation = $navigation->child;
            return $navigation->children;
        }
        return collect([]);
    }

}
