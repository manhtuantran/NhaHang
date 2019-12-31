<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContainersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('containers')->insert(
            [
                [
                    'name' => 'Kho HaNoi Restaurant 1',
                    'id_restaurant' => '2'
                ],
                [
                    'name' => 'HaNoi Restaurant 2',
                    'id_restaurant' => '3'
                ]
            ]
        );
    }
}

