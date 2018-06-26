<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Blog_tag;
class Tag extends Model
{
    //
    public function blogs()
    {
        return $this->hasMany('App\Http\Models\Blog_tag');
    }
    public function articles()
    {
        return $this->belongsToMany('App\Http\Models\Blog_article')
        ->withTimestamps();
    }
}
