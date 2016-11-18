<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /* Relationship Methods */

    /**
	* 
	*/
    public function author() {
        # Book belongs to Author
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('App\Author');
    }

    /**
	*
	*/
    public function tags()
    {
        # With timetsamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    /* End Relationship Methods */
}
