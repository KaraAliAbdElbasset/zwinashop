<?php


namespace App\QueryFilter;


use Illuminate\Support\Str;

class Price extends Filter
{

    protected function applyFilters($builder)
    {
        $q = request($this->filterName());
        if (Str::contains($q,'+'))
        {
            return $builder->where('price','>=',(int)explode('+',$q)[0]);
        }

        if (Str::contains($q,','))
        {
            $data = explode(',',$q);
            return $builder->whereBetween('price',[(int)$data[0],$data[1]]);

        }

        return $builder;

    }
}
