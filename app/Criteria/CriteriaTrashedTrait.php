<?php

namespace CodePub\Criteria;

trait CriteriaTrashedTrait{

    public function onlyTrashed()
    {
        $this->pushCriTeria(FindOnlyTrashedCriteria::class);
        return $this;
    }

    public function withTrashed(){

        $this->pushCriTeria(FindWithTrashedCriteria::class);
        return $this;
    }
}