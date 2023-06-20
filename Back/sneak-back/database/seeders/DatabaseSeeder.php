<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Category;
use App\Models\Keyword;
use App\Models\Messages;
use App\Models\OrderItems;
use App\Models\Orders;
use \App\Models\Product;
use App\Models\Response;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        Category::create([
            'name' => 'Nike',
        ]);
        Category::create([
            'name' => 'Adidas',
        ]);
        Category::create([
            'name' => 'Gucci',
        ]);
        Category::create([
            'name' => 'New Balance',
        ]);
        Category::create([
            'name' => 'Adidas',
        ]);
        Category::create([
            'name' => 'Noir',
        ]);
        Category::create([
            'name' => 'Blanc',
        ]);

        $product = Product::create([
            'name' => "Nike Air Vapormax 360",
            'description' => "La Nike Dunk Low : craquez pour cette paire confortable au look minimaliste !",
            'price' => "18000",
            'image' => "Chaussures/wfmZrHZsLYFqg9v8RwGu47nkcpDLuWPL4iqglNUk",
            'stock' => "15",
        ]);
        $product->categories()->attach(Category::where('name', '=', 'Nike')->first());
        $product->categories()->attach(Category::where('name', '=', 'Noir')->first());
        
        $product = Product::create([
            'name' => "Nike Air Force 1",
            'description' => "",
            'price' => "15000",
            'image' => "Chaussures/jgV8y0ko41oYwWzdTUf56BMLahZdwNtOkIAWiOTP",
            'stock' => "24",
        ]);
        $product->categories()->attach(Category::where('name', '=', 'Nike')->first());
        $product->categories()->attach(Category::where('name', '=', 'Blanc')->first());


        $product = Product::create([
            'name' => "Adidas NMD R1",
            'description' => "",
            'price' => "14000",
            'image' => "Chaussures/x2vnQrzVUfT6uCs6RsfisJdSs7U6HFhJW7HrnQFW",
            'stock' => "41",
        ]);

        $product->categories()->attach(Category::where('name', '=', 'Adidas')->first());
        $product->categories()->attach(Category::where('name', '=', 'Noir')->first());

        $product = Product::create([
            'name' => "Adidas Stan Smith",
            'description' => "",
            'price' => "1200",
            'image' => "Chaussures/mFCMnuWxIbrjWczzsYgONRHdETLyAjoB1I2jyZbY",
            'stock' => "73",
        ]);

        $product->categories()->attach(Category::where('name', '=', 'Adidas')->first());
        $product->categories()->attach(Category::where('name', '=', 'Blanc')->first());

        $product = Product::create([
            'name' => "Adidas Superstar",
            'description' => "",
            'price' => "1900",
            'image' => "Chaussures/3vhFA4EljaH3YucU3rmGAKrfu9Wh0D8sSEyehbPi",
            'stock' => "17",
        ]);
        $product->categories()->attach(Category::where('name', '=', 'Adidas')->first());
        $product->categories()->attach(Category::where('name', '=', 'Noir')->first());
        $product->categories()->attach(Category::where('name', '=', 'Blanc')->first());


        $product = Product::create([
            'name' => "New Balance 5740",
            'description' => "",
            'price' => "13500",
            'image' => "Chaussures/wfmZrHZsLYFqg9v8RwGu47nkcpDLuWPL4iqglNUk",
            'stock' => "58",
        ]);
        $product->categories()->attach(Category::where('name', '=', 'New Balance')->first());
        $product->categories()->attach(Category::where('name', '=', 'Noir')->first());
        $product->categories()->attach(Category::where('name', '=', 'Blanc')->first());


        User::create([
            'name' => 'Mathieu',
            'surname' =>'Capon',
            'email' => 'mathieu.capon@viacesi.fr',
            'password' => '$2y$10$582MwgnJGKCC2Bu.ApvleOZ8yCnBLnV/rPZuX.hSZOKGgKeNqJDxG', // discord for password
            'role' => 'admin',
            'phone' => '0782641856',
            'api_token' => Str::random(60),
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

        Orders::create([
            'status' => 0,
            'total' => 0,
            'user_id' => User::where('email', '=', 'mathieu.capon@viacesi.fr')->first()->id,
        ]);
        
        OrderItems::create([
            'product_id' => 1,
            'order_id' => 1,
            'quantity' => 3,
            'price' => 0,
        ]);
        OrderItems::create([
            'product_id' => 2,
            'order_id' => 1,
            'quantity' => 2,
            'price' => 0,
        ]);
    }
}