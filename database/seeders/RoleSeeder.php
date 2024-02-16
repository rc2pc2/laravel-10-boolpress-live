<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'Superadmin' => 1,
            'Admin' => 2,
            'Moderator' => 3,
            'Editor' => 4,
            'Superuser' => 5,
            'User' => 6,
        ];

        foreach ($roles as $roleName => $level) {
            $newRole = new Role();
            $newRole->name = $roleName;
            $newRole->level = $level;
            $newRole->save();
        }

    }
}
