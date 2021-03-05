<?php


namespace App\QueryFilter;


class Brand extends Filter
{

    protected function applyFilters($builder)
    {
        $q = request()->get($this->filterName());
        if (!empty($q))
        {
            return $builder->where('brand_id',$q);
        }
        return $builder;
    }
}
