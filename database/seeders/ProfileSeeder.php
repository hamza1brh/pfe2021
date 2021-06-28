<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile ;
use App\Models\Role ; 
use App\Models\User ;
class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $profiles=Profile::factory()->times(2)->create();

        $admin = Profile::find(1);
        $admin->user_id = 1 ;             // give the admin a profile 
        $admin->push();
        $kira = Profile::find(2);
        $kira->user_id = 2 ;
        $kira->push();
        // foreach($profiles as $profile)
        // {
        //     $profile->user()->associate($user);
        // } 

        // $profiles=Profile::factory()->times(12)->create();
        // Profile::all()->each( function($profile)  {
        //     $i = 1;
        //     $profile->user_id =  User::find($i)->id;
        //     $i++;
        // });
    }
}
