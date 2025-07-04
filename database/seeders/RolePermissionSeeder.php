<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $permissions = [
            'manage categories',
            'manage tools',
            'manage projects',
            'manage project tools',
            'manage wallets',
            'manage applicants',
            'manage connects',
            'manage connect topups',

            'apply job',
            'topup wallet',
            'withdraw wallet',
            'topup connect',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
            ]);
        }

        $clientRole = Role::firstOrCreate([
            'name' => 'project_client',
        ]);
        $clientPermissions = [
            'manage projects',
            'manage project tools',
            'manage applicants',
            'topup wallet',
            'withdraw wallet',
        ];
        $clientRole->syncPermissions($clientPermissions);

        $freelancerRole = Role::firstOrCreate([
            'name' => 'project_freelancer',
        ]);
        $freelancerPermissions = [
            'apply job',
            'withdraw wallet',
            'topup wallet',
            'manage connects',

            'topup connect',
        ];
        $freelancerRole->syncPermissions($freelancerPermissions);

        $superAdminRole = Role::firstOrCreate([
            'name' => 'super_admin',
        ]);

        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'rezzaahmad57@gmail.com',
            'occupation' => 'Owner',
            'connect' => 999,
            'password' => bcrypt('abcd1234'),
            'avatar' => '$avatarPath',
        ]);
        $user->assignRole($superAdminRole);

        $wallet = new Wallet([
            'balance' => 0,
        ]);
        $user->wallet()->save($wallet);

    }
}
