<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Origins;
use App\Models\Departures;
use App\Models\Travel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed Users
        $user1 = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin1234'),
            'role' => 'admin',
        ]);

        $user2 = User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user1234'),
            'role' => 'user',
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

        $departures = [
            '10:00',
            '09:00',
            '08:00',
        ];

        foreach ($departures as $departure) {
            Departures::create([
                'departure_category' => $departure,
            ]);
        }

        $travel1 = Travel::create([
            'travel_name' => 'Trip to Bali',
            'travel_price' => 500,
            'travel_picture' => 'storage/travel_pictures/medan.jpeg',
            'id_origin' => 1,
            'id_destination' => 2,
            'id_departure' => 1,
        ]);

        $travel2 = Travel::create([
            'travel_name' => 'Trip to Paris',
            'travel_price' => 1500,
            'travel_picture' => 'storage/travel_pictures/jakarta.jpeg',
            'id_origin' => 2,
            'id_destination' => 3,
            'id_departure' => 2,
        ]);
    }
}
