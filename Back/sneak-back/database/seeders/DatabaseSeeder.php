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
            'name' => 'Noir',
        ]);
        Category::create([
            'name' => 'Blanc',
        ]);

        $product = Product::create([
            'name' => "NIKE DUNK LOW PANDA",
            'description' => "La Nike Dunk Low : craquez pour cette paire confortable au look minimaliste !",
            'price' => "12000",
            'image' => "https://www.courir.com/dw/image/v2/BCCL_PRD/on/demandware.static/-/Sites-master-catalog-courir/default/dwe137876f/images/hi-res/001488292_101.png?sw=600&sh=600&sm=fit&frz-v=34",
            'stock' => "9",
        ]);
        $product->categories()->attach(Category::where('name', '=', 'Nike')->first());
        $product->categories()->attach(Category::where('name', '=', 'Blanc')->first());
        $product->categories()->attach(Category::where('name', '=', 'Noir')->first());
        
        $product = Product::create([
            'name' => "NEW BALANCE 2002R",
            'description' => "La New Balance 2002R réintroduit un favori de la course à pied technique des années 2000, en enrichissant le design original d’améliorations modernes. L’empeigne en matière synthétique suit des courbes élégantes et des découpes qui modernisent le look classique. Les caractéristiques de la semelle extérieure Stability Web et N-ergy anti-chocs, réunies sur une semelle intermédiaire ABZORB, offrent un confort et des performances qui ne peuvent pas être datées.",
            'price' => "17000",
            'image' => "https://www.e-scribe.fr/wp-content/uploads/2021/06/lifestyle-hommes-new-balance-2002r-munsell-white.jpg",
            'stock' => "18",
        ]);
        $product->categories()->attach(Category::where('name', '=', 'New Balance')->first());
        $product->categories()->attach(Category::where('name', '=', 'Blanc')->first());

        // Product::create([
        //     'name' => "",
        //     'description' => "",
        //     'price' => "",
        //     'image' => "",
        //     'stock' => "",
        // ]);

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
    }
}