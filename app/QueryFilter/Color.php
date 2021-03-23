<?php


namespace App\QueryFilter;


class Color extends Filter
{

    protected function applyFilters($builder)
    {
        $q = request($this->filterName());
        return $builder->whereHas('attributes',static function($query) use ($q){
            $query->where(['attribute' => 'color', 'value' => $q]);
        });
    }
}
