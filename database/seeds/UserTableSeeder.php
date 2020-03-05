<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin=array(
            array(
              'name'=>'Admin',
              'email'=>'admin@tourist.inc',
              'password'=>Hash::make('admin'),
              'role'=>'admin',
              'status'=>'active'
            ),
            array(
                'name'=>'Vendor',
                'email'=>'vendor@tourist.inc',
                'password'=>Hash::make('vendor'),
                'role'=>'vendor',
                'status'=>'active'
              )
        );

       foreach($admin as $ind_user){
           $user=App\User::where('email',$ind_user['email'])->first();

           if(!$user){
               $user=new User();
           }
           $user->fill($ind_user);
           $user->save();
       }

    }
}
