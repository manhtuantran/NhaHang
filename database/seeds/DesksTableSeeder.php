<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('desks')->insert(
            [
                [
                    'name' => 'Bàn số 1',
                    'id_restaurant' => '2',
                    'is_ordered' => '0'
                ],
                [
                    'name' => 'Bàn số 2',
                    'id_restaurant' => '2',
                    'is_ordered' => '0'
                ],
                [
                    'name' => 'Bàn số 3',
                    'id_restaurant' => '2',
                    'is_ordered' => '0'
                ],
                [
                    'name' => 'Bàn số 4',
                    'id_restaurant' => '2',
                    'is_ordered' => '0'
                ],
                [
                    'name' => 'Bàn số 5',
                    'id_restaurant' => '2',
                    'is_ordered' => '0'
                ],
                [
                    'name' => 'Bàn số 6',
                    'id_restaurant' => '2',
                    'is_ordered' => '0'
                ],
                [
                    'name' => 'Bàn số 7',
                    'id_restaurant' => '2',
                    'is_ordered' => '0'
                ],
                [
                    'name' => 'Bàn số 8',
                    'id_restaurant' => '2',
                    'is_ordered' => '0'
                ],
                [
                    'name' => 'Bàn số 9',
                    'id_restaurant' => '2',
                    'is_ordered' => '0'
                ],
                [
                    'name' => 'Bàn số 10',
                    'id_restaurant' => '2',
                    'is_ordered' => '0'
                ],
                [
                    'name' => 'Bàn số 1',
                    'id_restaurant' => '3',
                    'is_ordered' => '0'
                ],
                [
                    'name' => 'Bàn số 2',
                    'id_restaurant' => '3',
                    'is_ordered' => '0'
                ],
                [
                    'name' => 'Bàn số 3',
                    'id_restaurant' => '3',
                    'is_ordered' => '0'
                ],
                [
                    'name' => 'Bàn số 4',
                    'id_restaurant' => '3',
                    'is_ordered' => '0'
                ],
                [
                    'name' => 'Bàn số 5',
                    'id_restaurant' => '3',
                    'is_ordered' => '0'
                ],
                [
                    'name' => 'Bàn số 6',
                    'id_restaurant' => '3',
                    'is_ordered' => '0'
                ],
                [
                    'name' => 'Bàn số 7',
                    'id_restaurant' => '3',
                    'is_ordered' => '0'
                ],
                [
                    'name' => 'Bàn số 8',
                    'id_restaurant' => '3',
                    'is_ordered' => '0'
                ],
                [
                    'name' => 'Bàn số 9',
                    'id_restaurant' => '3',
                    'is_ordered' => '0'
                ],
                [
                    'name' => 'Bàn số 10',
                    'id_restaurant' => '3',
                    'is_ordered' => '0'
                ],
            ]
        );
    }
}
