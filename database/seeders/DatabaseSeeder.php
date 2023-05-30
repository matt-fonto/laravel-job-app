<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        Job::factory(10)->create();
        // Hardcoding the data
        // Job::create([
        //     'title' => 'PHP Developer',
        //     'tags' => 'php, laravel, symfony',
        //     'company' => 'Google',
        //     'email' => 'email1@email.com',
        //     'website' => 'https://google.com',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
        // ]);

        // Job::create([
        //     'title' => 'React Developer',
        //     'tags' => 'react, typescript, node',
        //     'company' => 'Amazon',
        //     'email' => 'email2@email.com',
        //     'website' => 'https://amazon.com',
        //     'description' => 'Lorem ipsum dolor sit amet.',
        // ]);

        // Job::create([
        //     'title' => 'Typescript Developer',
        //     'tags' => 'typescript, node, oop',
        //     'company' => 'Tesla',
        //     'email' => 'email3@email.com',
        //     'website' => 'https://tesla.com',
        //     'description' => 'Lorem ipsum dolor sit amet.',
        // ]);


    }
}
