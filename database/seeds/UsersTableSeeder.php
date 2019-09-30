<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Profile;
use App\BlogPost;


use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //For insert Admin Data...................................
            $user = new User;
            $user->name = 'Admin';
            $user->email = 'admin@gmail.com';
            $user->PhoneNum = '01944444444444';
            $user->location = 'Dhaka';
            $user->role = 1;
            $user->password = Hash::make('Admin@123');
            $user->save();

           //For insert Admin profile...................................
              $prof = new Profile;
              $prof->user_id      = $user->id;
              $prof->about        = 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Enim in molestiae maiores aperiam quia blanditiis esse eum, optio incidunt laudantium distinctio possimus! Recusandae nihil eum, eaque sequi corrupti quia numquam non? Incidunt, sequi laudantium aspernatur, quia sunt velit, quas laborum quae hic commodi odio soluta voluptatum corrupti deleniti adipisci mollitia. ';
              $prof->facebook     ='https://www.facebook.com/';
              $prof->youtube      ='https://www.youtube.com/';
              $prof->save();

        //For insert User Data.......................................
        $user = new User;
        $user->name = 'jamal';
        $user->email = 'jamal@gmail.com';
        $user->PhoneNum = '01855555555';
        $user->location = 'Jamalpur';
        $user->role = 0;
        $user->password = Hash::make('Jamal@123');
        $user->save();
          //For insert User profile...................................
          $prof = new Profile;
          $prof->user_id      = $user->id;
          $prof->about        = 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Enim in molestiae maiores aperiam quia blanditiis esse eum, optio incidunt laudantium distinctio possimus! Recusandae nihil eum, eaque sequi corrupti quia numquam non? Incidunt, sequi laudantium aspernatur, quia sunt velit, quas laborum quae hic commodi odio soluta voluptatum corrupti deleniti adipisci mollitia. ';
          $prof->facebook     ='https://www.facebook.com/';
          $prof->youtube      ='https://www.youtube.com/';
          $prof->save();

        $user = new User;
        $user->name = 'kamal';
        $user->email = 'kamal@gmail.com';
        $user->PhoneNum = '01799999999999';
        $user->location = 'Kamalpur';
        $user->role = 0;
        $user->password = Hash::make('Kamal@123');
        $user->save();
         //For insert User profile...................................
          $prof = new Profile;
          $prof->user_id      = $user->id;
          $prof->about        = 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Enim in molestiae maiores aperiam quia blanditiis esse eum, optio incidunt laudantium distinctio possimus! Recusandae nihil eum, eaque sequi corrupti quia numquam non? Incidunt, sequi laudantium aspernatur, quia sunt velit, quas laborum quae hic commodi odio soluta voluptatum corrupti deleniti adipisci mollitia. ';
          $prof->facebook     ='https://www.facebook.com/';
          $prof->youtube      ='https://www.youtube.com/';
          $prof->save();

        $user = new User;
        $user->name = 'dhamal';
        $user->email = 'dhamal@gmail.com';
        $user->PhoneNum = '01511111111111';
        $user->location = 'Dhamalpur';
        $user->role = 0;
        $user->password = Hash::make('Dhamal@123');
        $user->save();
         //For insert User profile...................................
         $prof = new Profile;
         $prof->user_id      = $user->id;
         $prof->about        = 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Enim in molestiae maiores aperiam quia blanditiis esse eum, optio incidunt laudantium distinctio possimus! Recusandae nihil eum, eaque sequi corrupti quia numquam non? Incidunt, sequi laudantium aspernatur, quia sunt velit, quas laborum quae hic commodi odio soluta voluptatum corrupti deleniti adipisci mollitia. ';
         $prof->facebook     ='https://www.facebook.com/';
         $prof->youtube      ='https://www.youtube.com/';
         $prof->save();

        //For insert Doctor Data.......................................
        $user = new User;
        $user->name = 'doctor';
        $user->email = 'doctor@gmail.com';
        $user->PhoneNum = '01311111111111';
        $user->location = 'Kudduspur';
        $user->role = 2;
        $user->password = Hash::make('Doctor@123');
        $user->save();
          //For insert Doctor profile...................................
          $prof = new Profile;
          $prof->user_id      = $user->id;
          $prof->about        = 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Enim in molestiae maiores aperiam quia blanditiis esse eum, optio incidunt laudantium distinctio possimus! Recusandae nihil eum, eaque sequi corrupti quia numquam non? Incidunt, sequi laudantium aspernatur, quia sunt velit, quas laborum quae hic commodi odio soluta voluptatum corrupti deleniti adipisci mollitia. ';
          $prof->facebook     ='https://www.facebook.com/';
          $prof->youtube      ='https://www.youtube.com/';
          $prof->save();

    }
}
