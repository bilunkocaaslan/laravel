<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class MarkProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mark_product')->insert([

                "mark_id" => "3",
                "product_id" => "4",
                "price" => "7",
                "stock" => '32',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
