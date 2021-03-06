<?php

namespace CodePub\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model implements  TableInterface
{
    #para trabalhar com delete logico.
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    #--------------------------------

    protected $fillable = [
       'name'
    ];

    public function getNameTrashedAttribute()
    {

        return $this->trashed() ? "{$this->name}(Inativa)":$this->name;
        
    }
    
    #relacionamento de categoria e livro
    public function books()
    {
        return $this->belongsToMany(Book::class);
    }

    public function getTableHeaders()
    {
        return['#','Nome'];
    }

    /**
     * Get the value for a given header. Note that this will be the value
     * passed to any callback functions that are being used.
     *
     * @param string $header
     * @return mixed
     */
    public function getValueForHeader($header)
    {
        switch ($header) {

            case'#':
                return $this->id;
            case 'Nome' :
                return $this->name;
        }
    }
}
