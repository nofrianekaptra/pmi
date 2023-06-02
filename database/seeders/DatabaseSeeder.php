<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        Role::create(['name' => 'admin']);

        $user = \App\Models\User::factory()->create([
            'name' => 'Administrators PMI Dharmasraya',
            'email' => 'admin@admin.com',
            'username' => 'admin',
            'password' => bcrypt('1')
        ]);

        $user->assignRole('admin');
    }
}
