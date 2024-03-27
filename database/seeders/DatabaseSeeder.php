<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create(
            [
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password'=> Hash::make('admin'),
            'phone'=>'0812345678',
            ]
        );
        \App\Models\User::factory()->create(
            [
            'name' => 'Dokter',
            'email' => 'dokter@gmail.com',
            'password'=> Hash::make('dokter'),
            'phone'=>'0812345678',
            ]
        );
        $this->call(DokterSeed::class);
    }
}
