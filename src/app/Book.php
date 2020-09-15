<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function getAuthor()
    {
        return $this->belongsTo('App\Author', 'author_id', 'id');
    }
}
