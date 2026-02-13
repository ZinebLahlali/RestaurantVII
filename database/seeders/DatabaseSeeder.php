<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
   

    /**
     * Seed the application's database.
     */

   
    public function run(): void
    {
        // User::factory(10)->create();

      Permission::create(['name' => 'edit restaurant']);
      Permission::create(['name' => 'delete restaurant']);

      $admin = Role::create(['name' => 'admin']);
      $client = Role::create(['name' => 'client']);
      $restaurateur = Role::create(['name' => 'restaurateur']);

      $admin->givePermissionTo('delete restaurant');
      $restaurateur->givePermissionTo('edit restaurant');
       $restaurateur->givePermissionTo('delete restaurant');
      

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
