<?php

namespace Database\Seeders;

use App\Models\AttributeValue;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class AttributeValueSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $values = [
            'size' =>    [
                [
                    'name' => 'M',
                    'display_name' => 'M',
                    'attribute_id' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'L',
                    'display_name' => 'L',
                    'attribute_id' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'XL',
                    'display_name' => 'XL',
                    'attribute_id' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'XXL',
                    'display_name' => 'XXL',
                    'attribute_id' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ],
            'color' =>    [
                [
                    'name' => 'Red',
                    'display_name' => 'Red',
                    'attribute_id' => 2,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Green',
                    'display_name' => 'Green',
                    'attribute_id' => 2,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Blue',
                    'display_name' => 'Blue',
                    'attribute_id' => 2,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Black',
                    'display_name' => 'Black',
                    'attribute_id' => 2,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ]

        ];
        foreach ($values as $key => $value)
        {
            AttributeValue::insert($value);
        }
    }
}
