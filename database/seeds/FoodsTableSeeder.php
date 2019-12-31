<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('foods')->insert(
            [
                [
                    'id_restaurant' => '2',
                    'name' => 'Bánh mỳ trứng',
                    'description' => 'Món ăn sinh viên',
                    'price' => '1000'
                ],
                [
                    'id_restaurant' => '3',
                    'name' => 'Bánh mỳ trứng',
                    'description' => 'Món ăn sinh viên',
                    'price' => '1000'
                ],
                [
                    'id_restaurant' => '2',
                    'name' => 'Mỳ xào xúc xích',
                    'description' => 'Món ăn sinh viên',
                    'price' => '1500'
                ],
                [
                    'id_restaurant' => '3',
                    'name' => 'Mỳ xào xúc xích',
                    'description' => 'Món ăn sinh viên',
                    'price' => '1500'
                ],
            ]
        );
    }
}
