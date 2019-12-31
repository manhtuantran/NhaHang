<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('materials')->insert(
            [
                [
                    'name' => 'Trứng',
                    'quantity' => '1000',
                    'id_container' => '1'
                ],
                [
                    'name' => 'Trứng',
                    'quantity' => '1000',
                    'id_container' => '2'
                ],
                [
                    'name' => 'Bánh mỳ',
                    'quantity' => '1000',
                    'id_container' => '1'
                ],
                [
                    'name' => 'Bánh mỳ',
                    'quantity' => '1000',
                    'id_container' => '2'
                ],
                [
                    'name' => 'Mỳ gói',
                    'quantity' => '1000',
                    'id_container' => '1'
                ],
                [
                    'name' => 'Mỳ gói',
                    'quantity' => '1000',
                    'id_container' => '2'
                ],
                [
                    'name' => 'Xúc xích',
                    'quantity' => '1000',
                    'id_container' => '1'
                ],
                [
                    'name' => 'Xúc xích',
                    'quantity' => '1000',
                    'id_container' => '2'
                ],
            ]
        );
    }
}
