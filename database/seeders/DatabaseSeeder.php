<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
         $user = User::factory()->create([
             'name' => 'Test Admin',
             'email' => 'admin@gmail.com',
         ]);
        $user->assignRole('admin');
        $this->call(PermissionSeeder::class);

    }
}
