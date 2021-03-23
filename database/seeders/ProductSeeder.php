<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Exception
     */
    public function run()
    {
        Product::factory(1000)->create()->each(static function($p){
            for ($i = random_int(1,5) ; $i < random_int(6,10);$i++)
            {
                $p->categories()->attach($i);
            }
        });
    }
}
