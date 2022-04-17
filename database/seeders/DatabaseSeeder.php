<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Storage::deleteDirectory('public/products');
        Storage::makeDirectory('public/products');

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        Category::factory(4)->create();
        Tag::factory(8)->create();
        $this->call(ProviderSeeder::class);
        $this->call(ProductSeeder::class); 
        $this->call(OrderSeeder::class); 
    }
}
