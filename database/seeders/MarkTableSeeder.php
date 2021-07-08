<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;
class MarkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $marks = [
            [
                'm_name' => "Torku",
                'image' => 'https://seeklogo.com/images/T/torku-logo-B85D336F2D-seeklogo.com.png',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
            ];
            DB::table('marks')->insert($marks);
       
     }
}
