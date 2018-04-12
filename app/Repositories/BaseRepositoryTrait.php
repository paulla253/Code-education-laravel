<?php


namespace CodePub\Repositories;

trait BaseRepositoryTrait{

    #substituindo uma function que já existe,
    public function lists($column,$key=null)
    {
        $this->applyCriteria();

        return $this->model->pluck($column,$key);
    }

}