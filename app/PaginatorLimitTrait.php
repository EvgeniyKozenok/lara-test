<?php


namespace App;


trait PaginatorLimitTrait
{
    public function getPaginate()
    {
        return request()->get('limit', 10);
    }
}
