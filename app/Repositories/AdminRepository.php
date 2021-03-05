<?php


namespace App\Repositories;


use App\Contracts\AdminContract;
use App\Models\Admin;
use Illuminate\Routing\Pipeline;

class AdminRepository implements AdminContract
{

    /**
     * @inheritDoc
     */
    public function findOneById($id)
    {
        return Admin::findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function findByFilter($per_page = 10)
    {
        return app(Pipeline::class)
            ->send(Admin::orderBy('created_at','desc')->newQuery())
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
        $data['password'] = bcrypt($data['password']);
        return Admin::create($data);
    }

    /**
     * @inheritDoc
     */
    public function update($id, array $data)
    {
        $admin = $this->findOneById($id);
        $admin->update($data);
        return $admin->refresh();
    }

    /**
     * @inheritDoc
     */
    public function delete($id)
    {
        $a = $this->findOneById($id);
        if ($a->role === 'owner')
        {
            return false;
        }
        return $a->delete($id);
    }
}
