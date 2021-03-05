<?php


namespace App\Repositories;


use App\Models\Order;
use Illuminate\Routing\Pipeline;

class OrderRepository implements \App\Contracts\OrderContract
{

    /**
     * @inheritDoc
     */
    public function findById($id)
    {
        return Order::findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function findOneBy(array $params, array $relations = [])
    {
        return Order::with($relations)->where($params)->firstOrFail();
    }

    /**
     * @inheritDoc
     */
    public function findByFilter($per_page = 10)
    {
        return app(Pipeline::class)
            ->send(Order::orderBy('created_at','desc')->newQuery())
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
    public function update($id, array $data)
    {
        $o = $this->findOneBy(['id' => $id],['products']);
        if ($data['state'] === 'validated' && $o->state !== 'validated' && $o->state === 'canceled') {
            $o->products->each(static function ($p){
                if ($p->pivot->qty < $p->qte){
                    $p->qte -= $p->pivot->qty;
                }else{
                    $p->qte = 0;
                }
                $p->save();
            });
        }
        if ($data['state'] === 'canceled' && $o->state !== 'canceled'){
            // update the product qte
            $o->products->each(function ($p){
                $p->qte += $p->pivot->qty;
                $p->save();
            });
        }

        $o->update($data);
        session()->flash('success','Order has been updated successfully');
        return redirect()->route('admin.orders.show',$o->id);
    }

    /**
     * @inheritDoc
     */
    public function delete($id)
    {
            $o = $this->findById($id);
            $o->delete();
    }
}
