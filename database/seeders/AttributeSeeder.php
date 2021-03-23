<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class AttributeSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $attributes = [
            [
                'name' => 'size',
                'display_name' => 'attributes.size',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'color',
                'display_name' => 'attributes.color',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        Attribute::insert($attributes);
    }
}
