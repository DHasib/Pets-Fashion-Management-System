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
        $DH->slider_title      = 'Welcome to Our Pets Fashion';
        $DH->slider_heading    = 'At vero eos et accusamus et iusto odio dignissimos.';
        $DH->slider_desc       = 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium';
        $DH->slider_image      = '/images/Slider_img/img-1.jpg';
        $DH->save();

        $DH = new DynamicHomepage;
        $DH->slider_title      =  'Welcome to Our Pets Fashion';
        $DH->slider_heading    ='At vero eos et accusamus et iusto odio dignissimos.';
        $DH->slider_desc       = 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium';
        $DH->slider_image      = '/images/Slider_img/img-2.jpg';
        $DH->save();

        $DH = new DynamicHomepage;
        $DH->slider_title      =  'Welcome to Our Pets Fashion';
        $DH->slider_heading    ='At vero eos et accusamus et iusto odio dignissimos.';
        $DH->slider_desc       = 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium';
        $DH->slider_image      = '/images/Slider_img/img-3.jpg';
        $DH->save();
    }
}
