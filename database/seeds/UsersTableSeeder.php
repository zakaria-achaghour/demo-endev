<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        //User::truncate();
       // DB::table('role_user')->truncate();

        // select les role 
        $adminRole = Role::where('name','admin')->first();
        $authorRole = Role::where('name','participant')->first();
        $userRole = Role::where('name','user')->first();


        // create users
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
        ]);
       

            // attach role and user
            $admin->roles()->attach($adminRole);
           





    }
}
