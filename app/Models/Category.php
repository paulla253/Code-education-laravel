<?php

namespace CodePub\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Category extends Model implements  TableInterface
{
    protected $fillable = [
       'name'

    ];


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
