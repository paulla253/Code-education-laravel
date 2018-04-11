<?php

namespace CodePub\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FindByCategoryCriteria.
 *
 * @package namespace CodePub\Criteria;
 */
class FindByCategoryCriteria implements CriteriaInterface
{
    public function __construct($name)
    {
        $this->name=$name;
    }


    public function apply($model, RepositoryInterface $repository)
    {
        return $model->where('name','Like',"%{$this->name}");
    }
}
