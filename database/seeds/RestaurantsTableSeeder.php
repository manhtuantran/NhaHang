<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('restaurants')->insert(
            [
                [
                    'name' => 'Tổng (chỉ admin)',
                    'location' => 'Thanh Xuân'
                ],
                [
                    'name' => 'HaNoi Restaurant 1',
                    'location' => 'Cổ Nhuế 2'
                ],
                [
                    'name' => 'HaNoi Restaurant 2',
                    'location' => 'Xuân Đỉnh'
                ]
            ]
        );
    }
}
