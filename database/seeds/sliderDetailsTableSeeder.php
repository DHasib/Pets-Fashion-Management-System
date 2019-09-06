<?php

use Illuminate\Database\Seeder;


use App\DynamicHomePage;

class sliderDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $DH = new DynamicHomepage;
        $DH->slider_title      = 'DK Hasib';
        $DH->slider_heading    ='Lalbagh Dhaka';
        $DH->slider_desc       = 'ljkaieruedwfdjbfureydferfbherdefhedgfyegfyhuedfyewsmhdafvbjdhfgyueuh';
        $DH->slider_image      = 'Chrysanthemum.jpg';
        $DH->save();

        $DH = new DynamicHomepage;
        $DH->slider_title      = 'Ismail';
        $DH->slider_heading    ='gatrabari';
        $DH->slider_desc       = 'ljkaieruedwfdjbfureydferfbherdefhedgfyegfyhuedfyewsmhdafvbjdhfgyueuh';
        $DH->slider_image      = 'Koala.jpg';
        $DH->save();

        $DH = new DynamicHomepage;
        $DH->slider_title      = 'tamim';
        $DH->slider_heading    ='dhanmondhia';
        $DH->slider_desc       = 'ljkaieruedwfdjbfureydferfbherdefhedgfyegfyhuedfyewsmhdafvbjdhfgyueuh';
        $DH->slider_image      = 'Lighthouse.jpg';
        $DH->save();
    }
}
