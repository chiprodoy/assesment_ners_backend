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
        Role::create(['role_name'=>'mahasiswa']);
        Role::create(['role_name'=>'dosen']);
        //

        $mhs=\App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $mhs->roles()->attach(1);

        $dosen=\App\Models\User::factory()->create([
           'name' => 'Test Dosen',
           'email' => 'dosen@example.com',
       ]);

       $dosen->roles()->attach(2);
    }
}
