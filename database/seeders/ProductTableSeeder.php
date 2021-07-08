<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;
class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'p_name' => "chocolate biscuit",
                'price' => "6",
                'stock' => "24",
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQil9Xtffj2de0WuejkD6eOogRJgzTF50Thl5R_Y0nHN95lRrSjqaizAcylfS9jns-Pur4&usqp=CAU',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
            ];
            DB::table('products')->insert($products);
    }
}
