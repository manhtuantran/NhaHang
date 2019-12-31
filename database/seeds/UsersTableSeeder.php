<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert(
            [
                [
                    'username' => 'tuan',
                    'name' => 'Trần Mạnh Tuấn',
                    'level' => 'admin',
                    'password' => bcrypt('1'),
                    'id_restaurant' => '1',
                    'is_locked' => '0'
                ],
                [
                    'username' => 'nam',
                    'name' => 'Trần Văn Nam',
                    'level' => 'Quản lý',
                    'password' => bcrypt('1'),
                    'id_restaurant' => '2',
                    'is_locked' => '0'
                ],
                [
                    'username' => 'binh',
                    'name' => 'Nguyễn Văn Bình',
                    'level' => 'Thu Ngân',
                    'password' => bcrypt('1'),
                    'id_restaurant' => '2',
                    'is_locked' => '0'
                ],
                [
                    'username' => 'tien',
                    'name' => 'Nguyễn Văn Tiến',
                    'level' => 'Order',
                    'password' => bcrypt('1'),
                    'id_restaurant' => '2',
                    'is_locked' => '0'
                ],
                [
                    'username' => 'ngoc',
                    'name' => 'Lê Thanh Ngọc',
                    'level' => 'Thu Ngân',
                    'password' => bcrypt('1'),
                    'id_restaurant' => '2',
                    'is_locked' => '0'
                ],
                [
                    'username' => 'huyen',
                    'name' => 'Nguyễn Thanh Huyền',
                    'level' => 'Order',
                    'password' => bcrypt('1'),
                    'id_restaurant' => '2',
                    'is_locked' => '0'
                ],
                [
                    'username' => 'lien',
                    'name' => 'Nguyễn Thị Liên',
                    'level' => 'Quản lý',
                    'password' => bcrypt('1'),
                    'id_restaurant' => '3',
                    'is_locked' => '0'
                ],
            ]
        );
    }
}
