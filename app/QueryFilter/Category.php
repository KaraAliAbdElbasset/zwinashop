<?php


namespace App\QueryFilter;


class Category extends Filter
{

    protected function applyFilters($builder)
    {
        $q = request()->get($this->filterName());
        if (!empty($q))
        {
            return $builder->whereHas('categories',static function($query) use ($q){
                $query->where('id',$q)->orWhere('categories.category_id',$q);
            });
        }
        return $builder;
    }
}
