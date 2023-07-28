<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\classe;
use App\Models\section;
use App\Models\student;
use Faker\Factory as Faker;

class classeseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        classe::factory()
            ->count(10)
            ->sequence(fn ($sequence) => ['name' => 'Class ' . $sequence->index + 1])
            ->has(
                section::factory()
                    ->count(2)
                    ->state(
                        new Sequence(
                            ['name' => 'Section A'],
                            ['name' => 'Section B'],
                        )
                    )
                    ->has(
                        student::factory()
                            ->count(5)
                            ->state(
                                function (array $attributes, section $section) {
                                    $faker=Faker::create();
                                    return ['class_id' => $section->class_id,
                                    'name' => $faker->name(),  // Enter the desired name
                                    'email' => $faker->email(),  // Enter the desired email
                                    'phone_number' =>$faker->phoneNumber(),  // Enter the desired phone number
                                    'address' => $faker->address(),  // Enter the desired address
                                ];
                                }
                            )
                    )
            )
            ->create();
    }
}
