<?php
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::create([
            'name' => 'admin',
            'display_name' => 'Admin',
            'description' => 'Administrator role',
        ]);

        Role::create([
            'name' => 'user',
            'display_name' => 'User',
            'description' => 'Regular user role',
        ]);
    }
}
