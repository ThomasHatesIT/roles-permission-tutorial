<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            "user-list",
            "user-create", 
            "user-edit",
            "user-delete",
            "role-list",
            "role-create", 
            "role-edit",
            "role-delete",
            "products-list",
            "products-create",
            "products-edit",
            "products-delete",
        ];

       foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
