<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        if ($users->isEmpty()) {
            $this->command->info('No users found. Please seed users first.');
            return;
        }

        $animals = [
            [
                'animal_type' => 'Bessie',
                'breed' => 'Holstein',
                'last_vaccination' => Carbon::now()->subDays(30),
                'next_vaccination' => Carbon::now()->addDays(30),
                'last_deworming' => Carbon::now()->subDays(60),
                'next_deworming' => Carbon::now()->addDays(30),
                'status' => 'Alive',
            ],
            [
                'animal_type' => 'Daisy',
                'breed' => 'Jersey',
                'last_vaccination' => Carbon::now()->subDays(20),
                'next_vaccination' => Carbon::now()->addDays(40),
                'last_deworming' => Carbon::now()->subDays(50),
                'next_deworming' => Carbon::now()->addDays(40),
                'status' => 'Alive',
            ],
            [
                'animal_type' => 'Piggy',
                'breed' => 'Yorkshire',
                'last_vaccination' => Carbon::now()->subDays(15),
                'next_vaccination' => Carbon::now()->addDays(45),
                'last_deworming' => Carbon::now()->subDays(45),
                'next_deworming' => Carbon::now()->addDays(45),
                'status' => 'Alive',
            ],
            [
                'animal_type' => 'Wilbur',
                'breed' => 'Berkshire',
                'last_vaccination' => Carbon::now()->subDays(10),
                'next_vaccination' => Carbon::now()->addDays(50),
                'last_deworming' => Carbon::now()->subDays(40),
                'next_deworming' => Carbon::now()->addDays(50),
                'status' => 'Sold',
            ],
            [
                'animal_type' => 'Goaty',
                'breed' => 'Nubian',
                'last_vaccination' => Carbon::now()->subDays(25),
                'next_vaccination' => Carbon::now()->addDays(35),
                'last_deworming' => Carbon::now()->subDays(55),
                'next_deworming' => Carbon::now()->addDays(35),
                'status' => 'Alive',
            ],
            [
                'animal_type' => 'Billy',
                'breed' => 'Boer',
                'last_vaccination' => Carbon::now()->subDays(5),
                'next_vaccination' => Carbon::now()->addDays(55),
                'last_deworming' => Carbon::now()->subDays(35),
                'next_deworming' => Carbon::now()->addDays(55),
                'status' => 'Dead',
            ],
            [
                'animal_type' => 'Clucky',
                'breed' => 'Rhode Island Red',
                'last_vaccination' => Carbon::now()->subDays(12),
                'next_vaccination' => Carbon::now()->addDays(48),
                'last_deworming' => Carbon::now()->subDays(42),
                'next_deworming' => Carbon::now()->addDays(48),
                'status' => 'Alive',
            ],
            [
                'animal_type' => 'Henny',
                'breed' => 'Leghorn',
                'last_vaccination' => Carbon::now()->subDays(8),
                'next_vaccination' => Carbon::now()->addDays(52),
                'last_deworming' => Carbon::now()->subDays(38),
                'next_deworming' => Carbon::now()->addDays(52),
                'status' => 'Sold',
            ],
            [
                'animal_type' => 'Cowboy',
                'breed' => 'Angus',
                'last_vaccination' => Carbon::now()->subDays(18),
                'next_vaccination' => Carbon::now()->addDays(42),
                'last_deworming' => Carbon::now()->subDays(48),
                'next_deworming' => Carbon::now()->addDays(42),
                'status' => 'Alive',
            ],
            [
                'animal_type' => 'Porky',
                'breed' => 'Duroc',
                'last_vaccination' => Carbon::now()->subDays(22),
                'next_vaccination' => Carbon::now()->addDays(38),
                'last_deworming' => Carbon::now()->subDays(52),
                'next_deworming' => Carbon::now()->addDays(38),
                'status' => 'Dead',
            ],
        ];

        foreach ($animals as $animalData) {
            $user = $users->random();
            Animal::create(array_merge($animalData, ['user_id' => $user->id]));
        }

        $this->command->info('10 animals seeded successfully.');
    }
}