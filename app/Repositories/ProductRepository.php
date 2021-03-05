<?php


namespace App\Repositories;


use App\Models\Product;
use App\Traits\UploadAble;
use Illuminate\Routing\Pipeline;
use Illuminate\Support\Facades\Storage;

class ProductRepository implements \App\Contracts\ProductContract
{
    use UploadAble;
    /**
     * @inheritDoc
     */
    public function findOneById($id)
    {
        return Product::findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function findOneBy(array $params, array $relations = [])
    {
        return Product::with($relations)->where($params)->firstOrFail();
    }

    /**
     * @inheritDoc
     */
    public function findByFilter($per_page = 10, array $relations = [],$scopes=[])
    {
        return app(Pipeline::class)
            ->send(Product::scopes($scopes)->with($relations)->newQuery())
            ->through([
                \App\QueryFilter\Search::class,
                \App\QueryFilter\Category::class,
                \App\QueryFilter\Brand::class,
                \App\QueryFilter\Sort::class,
            ])
            ->thenReturn()
            ->paginate($per_page)
            ->appends(request()->query());
    }

    /**
     * @inheritDoc
     */
    public function findBy(array $param, $excepts = null, array $relations = [])
    {
         $products = Product::with($relations)->where($param);
         if (isset($excepts))
         {
             $ids = is_array($excepts) ? $excepts : [$excepts];
             $products = $products->whereNotIn('id',$ids);
         }
         return $products->get();
    }

    /**
     * @inheritDoc
     */
    public function add(array $data)
    {
        $collection = collect($data);

        if ($collection->has('image'))
        {
            $path = $this->uploadOne($collection->get('image'),'product','public');
            $collection->put('image',$path);
        }
        $collection->put('featured',request()->has('featured'));
        $collection->put('is_active',request()->has('is_active'));
        $collection->put('inspired',request()->has('inspired'));
        $product = Product::create($collection->except(['categories'])->all());
        $product->categories()->attach($collection->get('categories'));

        return $product;
    }

    /**
     * @inheritDoc
     */
    public function update($id, array $data)
    {
        $collection = collect($data);
        $p = $this->findOneById($id);
        if ($collection->has('image'))
        {
            if (isset($p->image))
            {
                $this->deleteOne($p->image);
            }
            $path = $this->uploadOne($collection->get('image'),'product','public');
            $collection->put('image',$path);
        }
        $collection->put('featured',request()->has('featured'));
        $collection->put('is_active',request()->has('is_active'));
        $collection->put('inspired',request()->has('inspired'));
        $p->update($collection->except(['categories'])->all());
        $p->categories()->sync($collection->get('categories'));

        return $p;
    }

    /**
     * @inheritDoc
     */
    public function delete($id)
    {
        $p = $this->findOneById($id);
        Storage::disk('public')->delete($p->images->pluck('path')->all());
        if (isset($p->image))
        {
            Storage::disk('public')->delete($p->image);
        }
        return $p->delete();

    }
}
