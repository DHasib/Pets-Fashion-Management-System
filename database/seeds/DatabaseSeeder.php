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
        $this->call(sliderDetailsTableSeeder::class);
        $this->call(TopHeaderDetailsTableSeeder::class);
        $this->call(BlogPostsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(PetsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
    }
}
