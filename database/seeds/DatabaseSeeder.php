<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RestaurantsTableSeeder::class);
        $this->call(ContainersTableSeeder::class);
        $this->call(MaterialsTableSeeder::class);
        $this->call(FoodsTableSeeder::class);
        $this->call(DesksTableSeeder::class);
    }
}
