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
            "role-list",
            "role-create", 
            "role-edit",
            "role-delete",
            "products-list",
            "products-create",
            "products-edit",
            "products-delete",

        ];

        foreach ($permissions as $key => $permissions){
            Permission::create(['name' => $permissions]);
        }
    }
}
