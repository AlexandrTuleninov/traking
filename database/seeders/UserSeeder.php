<?php

namespace Database\Seeders;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $developer = Role::where('slug','web-developer')->first();
        $manager = Role::where('slug', 'project-manager')->first();
        $createTasks = Permission::where('slug','create-tasks')->first();
        $manageUsers = Permission::where('slug','manage-users')->first();
        $user1 = new User();
        $user1->name = 'tul';
        $user1->email = 'tuleninov.98@gmail.com';
        $user1->password = bcrypt('secret');
        $user1->save();
        
        $user1->roles()->attach($developer);

        $user1->permissions()->attach($createTasks);
       
        $user2 = new User();
        $user2->name = 'rain';
        $user2->email = 'ranblion@gmail.com';
        $user2->password = bcrypt('secret');
        $user2->save();
        $user2->roles()->attach($manager);
        $user2->permissions()->attach($manageUsers);
    }
}