<?php


namespace App\Repositories;


use App\Models\User;
use App\Traits\UploadAble;
use Illuminate\Routing\Pipeline;

class UserRepository implements \App\Contracts\UserContract
{
    use UploadAble;
    /**
     * @inheritDoc
     */
    public function findOneById($id)
    {
        return User::findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function findByFilter($per_page = 10)
    {
        return app(Pipeline::class)
            ->send(User::orderBy('created_at','desc')->newQuery())
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
        $data['pic'] = $this->uploadUserImage();
        return User::create($data);
    }

    /**
     * @inheritDoc
     */
    public function update($id, array $data)
    {
        $User = $this->findOneById($id);
        $data['pic'] = $this->uploadUserImage($User);
        $User->update($data);
        return $User->refresh();
    }

    /**
     * @inheritDoc
     */
    public function delete($id)
    {
        $user = $this->findOneById($id);
        if (isset($user->pic))
        {
            $this->deleteOne($user->pic);
        }
        return User::destroy($id);
    }

    /**
     * @param User|null $user
     * @return false|mixed|string|null
     */
    private function uploadUserImage(User $user = null)
    {
        if (request()->hasFile('pic'))
        {
            $image = request()->file('pic');
            if ($user && isset($user->pic))
            {
                $this->deleteOne($user->pic);
            }
            return $this->uploadOne($image,'User','public');
        }

        if ($user && isset($user->pic))
        {
            return  $user->pic;
        }

        return null;
    }
}
