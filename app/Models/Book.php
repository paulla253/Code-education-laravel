<?php

namespace CodePub\Models;

use Bootstrapper\Interfaces\TableInterface;
use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model  implements  TableInterface
{
    use FormAccessible;

    #para trabalhar com delete logico.
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    #--------------------------------

    protected $fillable = [
        'author_id','title', 'subtitle','price',
    ];

    #muitos para um
    public function author(){
        return $this->belongsTo(User::class);
    }

    #relacionamento de categoria e livro
    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTrashed();
    }

    #precisa começar com form.

    /**
     * @return mixed
     */
    public function formCategoriesAttribute(){

        return $this->categories->pluck('id')->all();
    }

    #indice para as tabelas.
    public function getTableHeaders()
    {
        return['#','Titulo','Valor','Autor'];
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
            case 'Titulo' :
                return $this->title;
            case 'Valor' :
                return $this->price;
            case 'Autor' :
                return $this->author->name;
        }
    }

}
