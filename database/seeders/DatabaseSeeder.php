<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $roleAdmin= Role::create(['name' => 'admin']);
        $roleWriter= Role::create(['name' => 'writer']);
        // $permission = Permission::create(['name' => 'edit articles']);

        $user= User::create([
            'name'=> 'admin',
            'email'=> 'admin@gmail',
            'password'=> bcrypt('admin'),
            'role'=> 'admin'
        ]);

        $user->assignRole($roleAdmin);
    }
}
