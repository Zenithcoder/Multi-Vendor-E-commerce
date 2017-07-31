<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role_admin = Role::where('name', 'Admin')->first();
        $role_user = Role::where('name', 'User')->first();

        $admin = new User();
        $admin->name = 'Junior';
        $admin->email = 'Admin@mail.com';
        $admin->password = bcrypt('123456');
        $admin->admin = 1;
        $admin->is_activated = 1;
        $admin->save();
        $admin->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'James';
        $user->email = 'singlecliq@gmail.com';
        $user->password = bcrypt('123456');
        $user->admin = 1;
        $user->is_activated = 1;
        $user->save();
        $user->roles()->attach($role_user);

        $customer = new User();
        $customer->name = 'Osinachi';
        $customer->email = 'customer@gmail.com';
        $customer->password = bcrypt('123456');
        $customer->admin = 0;
        $customer->is_activated = 1;
        $customer->save();


    }
}
