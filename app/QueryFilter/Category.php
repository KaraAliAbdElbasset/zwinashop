<?php


namespace App\QueryFilter;


class Category extends Filter
{

    protected function applyFilters($builder)
    {
        $q = request()->get($this->filterName());
        if (!empty($q))
        {
            if (is_int($q))
            {
                return $builder->whereHas('categories',static function($query) use ($q){
                    $query->where('id',$q)->orWhere('categories.category_id',$q);
                });
            }else{
                return $builder->whereHas('categories',static function($query) use ($q){
                    $query->where('slug',$q);
                });
            }

        }
        return $builder;
    }
}
