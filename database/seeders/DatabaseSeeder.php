<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Sale;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'admin',
             'email' => 'admin@gmail.com',
             'password' => 'admin123',
         ]);

         \App\Models\Category::factory(10)->create();
         \App\Models\Item::factory(10)->create();

         $categories = \App\Models\Category::all();
         \App\Models\Item::all()->each(function ($item) use ($categories) {
             $item->categories()->attach(
                 $categories->random(rand(1, 3))->pluck('id')->toArray()
             );
         });

         \App\Models\Customer::factory(10)->create();

         \App\Models\Sale::factory(10)->create([
             'customer_id' => \App\Models\Customer::all()->random()->id,
             'item_id' => \App\Models\Item::all()->random()->id,
         ]);

        \App\Models\Purchase::factory(10)->create([
            'customer_id' => \App\Models\Customer::all()->random()->id,
            'item_id' => \App\Models\Item::all()->random()->id,
        ]);
    }
}
