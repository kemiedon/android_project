<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Blog_tag extends Model
{
    //
    public function tag_category()
    {
        return $this->hasOne('App\Http\Models\Tag', 'id','tag_id');
    }
    public function blogs()
    {
        return $this->hasOne('App\Http\Models\Blog_article', 'id','blog_article_id' );
    }
}
