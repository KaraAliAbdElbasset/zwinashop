<?php


namespace App\Helpers;


use App\Models\AttributeProduct;
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
     * @param array $data
     */
    public function add(Product $product,array $data): void
    {
        $item = [
            'product_id' => $product->id,
            'name'  => $product->name,
            'img'  => $product->image_url,
            'path'  => $product->path(),
            'basePrice'  => $product->price,
            'price'  => $product->price,
            'qty'   => 0,
            'attributes' => []
        ];
        $key = $product->id;
        if (array_key_exists('attributes',$data))
        {
            $result = $this->getAttributeData($product,$data);
            $item = $result['data'];
            $key = $result['key'];
        }

        if (!array_key_exists($key,$this->getItems()))
        {
            $this->items[$key] = $item;

        }

        $this->setTotalQty($this->getTotalQty()+$data['qty']);
        $this->setTotalPrice($this->getTotalPrice() + $item['price'] * $data['qty']);
        $this->items[$key]['qty'] += $data['qty'];
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
     * @param Product $p
     * @param array $data
     */
    public function getAttributeData(Product $p,array $data)
    {
        $item = [
            'product_id' => $p->id,
            'name'  => $p->name,
            'path'  => $p->path(),
            'img'  => $p->image_url,
            'basePrice'  => $p->price,
            'price'  => $p->price,
            'qty'   => 0,
            'attributes' => []
        ];

        $key = $p->id;
        if (array_key_exists('size', $data['attributes']))
        {
            $size = AttributeProduct::where([
                'product_id' => $p->id,
                'attribute' => 'size',
                'id' => $data['attributes']['size']
            ])->first();
            $item['attributes']['size'] = [
                'id' => $size->id,
                'value' => $size->value,
                'price' => $size->price,
            ] ;
            $key .= '-' . $data['attributes']['size'];
            $item['price'] += $size->price;
        }

        if (array_key_exists('color',$data['attributes']))
        {
            $color = AttributeProduct::where([
                'product_id' => $p->id,
                'attribute' => 'color',
                'id' => $data['attributes']['color']
            ])->firstOrFail();
            $item['attributes']['color'] = [
                'id' => $color->id,
                'value' => $color->value,
                'price' => $color->price,
            ] ;
            $key .= '-' . $data['attributes']['color'];
            $item['price'] += $color->price;
        }

        return [
            'data' => $item,
            'key' => $key
        ];
    }

    /**
     * @param $id
     */
    public function remove($id): void
    {
        $collection = collect($this->getItems());
        // get the item who will be deleted
        $item = $collection->get($id);
        // calculate the new subTotalPrice
        $this->setTotalPrice($this->getTotalPrice() - $item["price"] * $item["qty"]);
        // calculate the nrw totalQty
        $this->setTotalQty($this->getTotalQty() - $item["qty"]);

        // remove the item from the list of items
        $collection->forget($id);


        $this->setItems($collection->all());
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
