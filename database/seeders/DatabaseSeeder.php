<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Origins;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $origins = [
            'Aceh',
            'Papua',
            'Jakarta',
            'Surabaya'
        ];

        foreach ($origins as $origin) {
            Origins::create([
                'origin_name' => $origin,
            ]);
        }
    }
}
