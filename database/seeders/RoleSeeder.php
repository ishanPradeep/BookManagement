<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [ 'name' => 'admin', 'guard_name' => 'web' ],
            [ 'name' => 'user', 'guard_name' => 'web' ]
        ]);
    }
}
