<?php


namespace App\QueryFilter;


class Sort extends Filter
{

    protected function applyFilters($builder)
    {
        $q = request()->get($this->filterName());
        if (in_array($q,['name','price','qte','popularity','created_at']))
        {
            switch ($q){
                case 'created_at':return $builder->orderBy('created_at','desc');break;
                case 'price':return $builder->orderBy('price','asc');break;
                case 'name' : return $builder->orderBy('name','asc');break;
                case 'popularity':return $builder->orderBy('popularity','desc');break;
                case 'qte' : return $builder->orderBy('qte','desc');break;
            }

        }
        return $builder;
    }
}
