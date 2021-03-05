<?php


namespace App\QueryFilter;


use App\Models\User;

class Search extends Filter
{

    protected function applyFilters($builder)
    {
        $q = request($this->filterName());
        if (!empty($q))
        {
            if (request()->is('admin/orders*'))
            {
                return  $this->orderSearch($q,$builder);
            }

            if (request()->is('admin/newsletter*'))
            {
                 return $builder->where('email','like','%'.$q.'%');
            }

            if ($builder->getModel() instanceof  User){
                return $builder->where('first_name','like','%'.$q.'%')->orWhere('last_name','like','%'.$q.'%');
            }
            return $builder->where('name','like','%'.$q.'%');
        }
        return $builder;
    }

    /**
     * @param $q
     * @param $builder
     * @return mixed
     */
    private function orderSearch($q,$builder)
    {
        return $builder->where('id',$q)
            ->orWhere('first_name','like','%'.$q.'%')
            ->orWhere('last_name','like','%'.$q.'%');
    }
}
