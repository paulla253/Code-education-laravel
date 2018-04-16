<?php

namespace CodePub\Repositories;

use CodePub\Criteria\CriteriaOnlyTrashedTrait;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodePub\Repositories\BookRepository;
use CodePub\Models\Book;
use CodePub\Validators\BookValidator;

/**
 * Class BookRepositoryEloquent.
 *
 * @package namespace CodePub\Repositories;
 */
class BookRepositoryEloquent extends BaseRepository implements BookRepository
{
    use CriteriaOnlyTrashedTrait;
    use RepositoryRestoreTrait;

    #definir parametros para buscar.
    protected $fieldSearchable = [
        'title' => 'like',
         #nome da relação + o campo.
        'author.name' =>'like'

    ];

    #sobrescrever esse metodo.
    public function create(array $attributes)
    {
        $model =  parent::create($attributes);
        $model->categories()->sync($attributes['categories']);
        return $model;
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Book::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
