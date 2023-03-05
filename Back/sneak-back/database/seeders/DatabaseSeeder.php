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
        
        Product::factory(30)->create();

        User::create([
            'name' => 'Mathieu Capon',
            'email' => 'mathieu.capon@viacesi.fr',
            'password' => '$2y$10$582MwgnJGKCC2Bu.ApvleOZ8yCnBLnV/rPZuX.hSZOKGgKeNqJDxG', // discord for password
            'role' => 'admin'
        ]);

        Response::create([
            'message' => "Bonjour, je suis Marc de chez Sneak Me !---Que voulez-vous aujourd'hui ?"
        ]);
        Response::create([
            'message' => "NON PAS LES CORTEZ---Excusez-moi, êtes-vous low ?"
        ]);
        Keyword::create([
            'keyword' => 'bonjour',
            'message_id' => 1,
        ]);
        Keyword::create([
            'keyword' => 'slt',
            'message_id' => 1,
        ]);
        Keyword::create([
            'keyword' => 'salut',
            'message_id' => 1,
        ]);
        Keyword::create([
            'keyword' => 'cortez',
            'message_id' => 2,
        ]);
    }
}