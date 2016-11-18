<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{

    /* Relationship Methods */
    public function books() {
        # Author has many Books
        # Define a one-to-many relationship.
        return $this->hasMany('App\Book');
    }
}
