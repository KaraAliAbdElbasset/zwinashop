<?php


namespace App\Helpers;


use App\Models\Product;

class Cart
{
    private $items = [];
    private $total_qty;
    private $total_price;

    /**
     * Cart constructor.
     * @param Cart|null $cart
     */
    public function __construct(Cart $cart = null)
    {
        if ($cart)
        {
            $this->setItems($cart->getItems());
            $this->setTotalPrice($cart->getTotalPrice());
            $this->setTotalQty($cart->getTotalQty());
        }else
        {
            $this->setItems([]);
            $this->setTotalPrice(0);
            $this->setTotalQty(0);
        }
    }

    /**
     * @param Product $product
     * @param int $qty
     */
    public function add(Product $product,$qty = 1): void
    {

        $item = [
            'name'  => $product->name,
            'img'  => $product->image_url,
            'price'  => $product->price,
            'qty'   => 0,
        ];
        if (!array_key_exists($product->id,$this->getItems()))
        {
            $this->items[$product->id] = $item;

        }
        $this->setTotalQty($this->getTotalQty()+$qty);
        $this->setTotalPrice($this->getTotalPrice() + $product->price);
        $this->items[$product->id]['qty'] += $qty;
    }

    public function update(array $items): void
    {
        foreach ($items as $key => $qty)
        {
            $this->items[$key]["qty"] = $qty;
        }

        $collection = collect($this->getItems());

        $this->total_price = $collection->sum(function ($item){
            return $item["price"] * $item["qty"];
        });

        $this->total_qty = $collection->sum(function ($item){
            return $item["qty"];
        });
    }

    /**
     * @param $id
     */
    public function remove($id): void
    {
        $collection = collect($this->getItems());
        // get the item who will be deleted
        $item = $collection->get((int)$id);
        // calculate the new subTotalPrice
        $this->setTotalPrice($this->getTotalPrice() - $item["price"] * $item["qty"]);
        // calculate the nrw totalQty
        $this->setTotalQty($this->getTotalQty() - $item["qty"]);

        // remove the item from the list of items
        $filtered = $collection->filter(function ($value, $key) use($id){
            return $key!==(int)$id;
        });
        // update the list of items
        $this->setItems($filtered->all());
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param array $items
     */
    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    /**
     * @return mixed
     */
    public function getTotalQty()
    {
        return $this->total_qty;
    }

    /**
     * @param mixed $total_qty
     */
    public function setTotalQty(int $total_qty): void
    {
        $this->total_qty = $total_qty;
    }

    /**
     * @return mixed
     */
    public function getTotalPrice()
    {
        return $this->total_price;
    }

    /**
     * @param mixed $total_price
     */
    public function setTotalPrice($total_price): void
    {
        $this->total_price = $total_price;
    }

}
