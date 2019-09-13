<?php

use Illuminate\Database\Seeder;

use App\Dynamiclinks;

class TopHeaderDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Dlinks = new Dynamiclinks;
        $Dlinks->shop_contact_number      = '018542954252';
        $Dlinks->shop_email               = 'PetsFashion@gmail.com';
        $Dlinks->shop_open_details        = 'Sat-Thu 08:00 am to 8:00 pm';
        $Dlinks->shop_fb_link             = 'https://www.facebook.com/';
        $Dlinks->shop_tw_link             = 'https://twitter.com/login?lang=en';
        $Dlinks->shop_glg_link            = 'https://www.google.com/';
        $Dlinks->shop_instrsg_link        = 'https://www.instagram.com/';
        $Dlinks->shop_pint_link           = 'https://www.pinterest.com/';
        $Dlinks->shop_lnkd_link           = 'https://www.linkedin.com/';
        $Dlinks->save();

    }
}
