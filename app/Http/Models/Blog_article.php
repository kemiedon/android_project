<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Blog_tag;
class Blog_article extends Model
{
    //
    public function tags()
    {
        return $this->hasMany('App\Http\Models\Blog_tag');
    }
    public function save_tags()
    {
        return $this->belongsToMany('App\Http\Models\Tag')
        ->withTimestamps();
    }
}
