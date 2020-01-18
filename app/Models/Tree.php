<?php

namespace App\Models;

class Tree extends Model
{
    public function parentTree()
    {
        return $this->belongsTo(Tree::class, 'tree_id', 'id');
    }

    public function childrenTrees()
    {
        return $this->hasMany(Tree::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function scopeOfUrl($query, $url)
    {
        return $query->where('url', $url);
    }

    public function scopeTree($query)
    {
        return $query->whereNotNull('tree_id');
    }

    public function scopeNotTree($query)
    {
        return $query->whereNull('tree_id');
    }

    public function allChildrenTrees()
    {
        return $this->childrenTrees()->orderBy('order')->with('childrenTrees.section');
    }
}
