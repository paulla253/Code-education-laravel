<?php

namespace CodePub\Criteria;

trait CriteriaOnlyTrashedTrait{

    public function onlyTrashed(){

        $this->pushCriTeria(FindOnlyTrashedCriteria::class);
        return $this;
    }
}