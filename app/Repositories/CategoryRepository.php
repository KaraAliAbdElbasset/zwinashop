<?php


namespace App\Repositories;


use App\Models\Category;
use App\Traits\UploadAble;
use Illuminate\Routing\Pipeline;
use Illuminate\Support\Str;

class CategoryRepository implements \App\Contracts\CategoryContract
{
    use UploadAble;
    /**
     * @inheritDoc
     */
    public function findById($id)
    {
        return Category::findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function findOneBy(array $params, array $relations = null)
    {
        $category = Category::where($params);
        if (is_array($relations))
        {
            $category = $category->with($relations);
        }
         return $category->firstOrFail();
    }

    /**
     * @inheritDoc
     */
    public function findByFilter($per_page = 10,$relations = [])
    {
        $relations = is_array($relations) ? $relations  : [$relations];
        return app(Pipeline::class)
            ->send(Category::with($relations)->orderBy('created_at','desc')->newQuery())
            ->through([
                \App\QueryFilter\Search::class
            ])
            ->thenReturn()
            ->paginate($per_page)
            ->appends(request()->query());
    }

    /**
     * @inheritDoc
     */
    public function add(array $data)
    {
        if (isset($data['image']))
        {
            $data['image'] = $this->uploadOne($data['image'],'category','public');
        }
        $data['slug'] = Str::slug($data['name']);
        $data['featured'] = request()->has('featured');

        if ((int)$data['category_id'] === 0){
            $data['category_id'] = null;
        }
        return Category::create($data);
    }

    /**
     * @inheritDoc
     */
    public function update($id, array $data)
    {
        $category = $this->findById($id);
        if (isset($data['image']))
        {
            if (isset($category->image))
            {
                $this->deleteOne($category->image,'public');
            }
            $data['image'] = $this->uploadOne($data['image'],'category','public');
        }
        if ((int)$data['category_id'] === 0){
            $data['category_id'] = null;
        }
        $data['featured'] = request()->has('featured');
        $data['slug'] = Str::slug($data['name']);
        $category->update($data);
        return $category->refresh();
    }

    /**
     * @inheritDoc
     */
    public function delete($id)
    {
        $category = $this->findById($id);
        if (isset($category->image))
        {
            $this->deleteOne($category->image,'public');
        }
        return $category->delete();
    }

    public function findBy(array $params, $excepts = null,array $relations = null)
    {
        $category = Category::where($params);
        if (is_array($relations))
        {
            $category = $category->with($relations);
        }
        if ($excepts){
            $ids = is_array($excepts) ? $excepts : [$excepts];
            $category = $category->whereNoTIn('id',$ids);
        }
        return $category->get();
    }

    /**
     * @param array|null $excepts
     * @param array|null $relations
     * @return mixed
     */
    public function all($excepts = null,array $relations = null)
    {
        $category = Category::orderBy('name','asc');
        if (is_array($relations))
        {
            $category = $category->with($relations);
        }
        if ($excepts){
            $ids = is_array($excepts) ? $excepts : [$excepts];
            $category = $category->whereNoTIn('id',$ids);
        }
        return $category->get();

    }
}
