<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function getAuthor()
    {
        return $this->hasMany('App\Book', 'author_id', 'id');
    }
}
