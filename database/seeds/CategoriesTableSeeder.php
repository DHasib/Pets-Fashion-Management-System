<?php

use Illuminate\Database\Seeder;

use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
   
    //For insert Categories Data...................................
         $categorr = new Category;
         $categorr->name = 'Dog';
         $categorr->save();

         $categorr = new Category;
         $categorr->name = 'Cat';
         $categorr->save();

         $categorr = new Category;
         $categorr->name = 'Birds';
         $categorr->save();

         $categorr = new Category;
         $categorr->name = 'Rabbit';
         $categorr->save();


    }
}
