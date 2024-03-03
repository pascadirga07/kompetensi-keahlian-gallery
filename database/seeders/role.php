<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

use App\Models\Role as RoleModel;

class role extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $roles = [
            ['name' => 'admin', 'description' => 'Admin'],
            ['name' => 'client', 'description' => 'Client'],
        ];

        foreach ($roles as $role) {
            $role['created_at'] = Carbon::now();
            $role['updated_at'] = Carbon::now();

            RoleModel::create($role);
        }
    }
}