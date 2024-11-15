<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Support\Constant;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = Constant::custom_roles();
        $this->command->info('Creating roles...');

        foreach($roles as $role){
            Role::create(['name' => $role]);
            $this->command->info('Created role : '.$role);
        }
        $this->command->info('All roles created...');
    }
}
