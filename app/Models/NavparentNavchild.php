<?php

namespace App\Models;



class NavparentNavchild extends Model
{
    protected $table = 'navparent_navchild';

    protected $guarded = ['id'];

    public function scopeOfUrl($query, $url)
    {
        return $query->where('url', $url);
    }

    public function child()
    {
        return $this->hasOne(Navigation::class, 'id', 'child_id');
    }

    public function parent()
    {
        return $this->hasOne(Navigation::class, 'id', 'parent_id');
    }
}
