<?php

namespace CodePub\Repositories;

use CodePub\Criteria\CriteriaTrashedTrait;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodePub\Models\Book;

/**
 * Class BookRepositoryEloquent.
 *
 * @package namespace CodePub\Repositories;
 */
class BookRepositoryEloquent extends BaseRepository implements BookRepository
{
    use CriteriaTrashedTrait;
    use RepositoryRestoreTrait;

    #definir parametros para buscar.
    protected $fieldSearchable = [
        'title' => 'like',
         #nome da relação + o campo.
        'author.name' =>'like',
        'categories.name'=>'like'
    ];

    #sobrescrever esse metodo.
    public function create(array $attributes)
    {
        $model =  parent::create($attributes);
        $model->categories()->sync($attributes['categories']);
        return $model;
    }

    public function update(array $attributes,$id)
    {
        $model =  parent::update($attributes,$id);
        $model->categories()->sync($attributes['categories']);
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
