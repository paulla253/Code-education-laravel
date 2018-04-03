<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'author_id','title', 'subtitle','price',
    ];

    public function authors()
    {
        return $this->hasOne('App\Author');
    }


}
