<?php

namespace CodePub\Models;

use CodePub\Models\User;
use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Book extends Model  implements  TableInterface
{
    protected $fillable = [
        'author_id','title', 'subtitle','price',
    ];

    public function author(){
        return $this->belongsTo(User::class);
    }


    public function getTableHeaders()
    {
        return['#','Titulo','Valor'];
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
        }
    }


}
