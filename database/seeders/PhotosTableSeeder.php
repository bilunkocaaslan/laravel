<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $photos = [
            [
                'table_name' => "marks",
                'table_id' => '9',
                'path' => 'https://seeklogo.com/images/T/torku-logo-B85D336F2D-seeklogo.com.png',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
            ];
            DB::table('photos')->insert($photos);
    }
}
