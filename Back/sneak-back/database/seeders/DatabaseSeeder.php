<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Category;
use App\Models\Keyword;
use App\Models\Messages;
use \App\Models\Product;
use App\Models\Response;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        Category::factory(5)->create();
        
        Product::factory(10)->create();

        User::create([
            'name' => 'Mathieu',
            'surname' =>'Capon',
            'email' => 'mathieu.capon@viacesi.fr',
            'password' => '$2y$10$582MwgnJGKCC2Bu.ApvleOZ8yCnBLnV/rPZuX.hSZOKGgKeNqJDxG', // discord for password
            'role' => 'admin',
            'phone' => '0782641856'
        ]);

        Response::create([
            'message' => "Bonjour, je suis Marc de chez Sneak Me !---Que voulez-vous aujourd'hui ?",
            'type' => 'message',
            'name' => 'Bonjour',
        ]);
        Response::create([
            'message' => "NON PAS LES CORTEZ---Excusez-moi, êtes-vous low ?",
            'type' => 'message',
            'name' => 'Cortez',
        ]);
        Response::create([
            'message' => "Voici le mail pour notre support : |||prankex@prankom.fr",
            'type' => 'message',
            'name' => 'Support',
        ]);

        Keyword::create([
            'keyword' => 'bonjour',
            'response_id' => 1,
        ]);
        Keyword::create([
            'keyword' => 'slt',
            'response_id' => 1,
        ]);
        Keyword::create([
            'keyword' => 'salut',
            'response_id' => 1,
        ]);
        Keyword::create([
            'keyword' => 'cortez',
            'response_id' => 2,
        ]);
        Keyword::create([
            'keyword' => 'support',
            'response_id' => 3,
        ]);
    }
}