<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function Cate_post()
    {

        return $this->belongsTo('App\Models\Cate_post', 'cate_post_id', 'id');
    }
}
