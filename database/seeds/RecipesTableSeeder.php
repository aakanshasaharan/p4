<?php

use Illuminate\Database\Seeder;

class RecipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $menu_id = \App\Menu::where('menu_type','=','Appetizer')->pluck('id');
      DB::table('recipes')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'recipe_name' => 'Vegetable Samosa',
      'menu_id' => $menu_id,
      'user_id' => 1,
      'image_url' => 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcT_e7I4C_lUkMuhsadXSGP4eycr1lw6XVAyoiiOcYkq33C7W2f9',
      ]);

      $menu_id = \App\Menu::where('menu_type','=','Drinks')->pluck('id');
      DB::table('recipes')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'recipe_name' => 'Thandai',
      'menu_id' => $menu_id,
      'user_id' => 1,
      'image_url' => 'http://www.burrp.com/know/wp-content/uploads/2014/03/Almond-Thandai-Cocktail-300x300.jpg',
      ]);

      $menu_id = \App\Menu::where('menu_type','=','Paneer Speical')->pluck('id');
      DB::table('recipes')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'recipe_name' => 'Paneer Masala',
      'menu_id' => $menu_id,
      'user_id' => 1,
      'image_url' => 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcStXXrG4yj8m7UwaAa4tw-cJk4EIf84LdvIHkKouZ1wMEm8pgYD',
      ]);

      $menu_id = \App\Menu::where('menu_type','=','Daal Speical')->pluck('id');
      DB::table('recipes')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'recipe_name' => 'Daal Makhni',
      'menu_id' => $menu_id,
      'user_id' => 1,
      'image_url' => 'http://images.tastespotting.com/thumbnails/707997.jpg',
      ]);

      $menu_id = \App\Menu::where('menu_type','=','Desserts')->pluck('id');
      DB::table('recipes')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'recipe_name' => 'Faluda Malai Kulfi',
      'menu_id' => $menu_id,
      'user_id' => 1,
      'image_url' => 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSsSJ9C47iOWslT2euXH8jToC9g9VeP1fRJ-gWPDcDS9v9Ly4j7',
      ]);

      $menu_id = \App\Menu::where('menu_type','=','Raita')->pluck('id');
      DB::table('recipes')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'recipe_name' => 'Boondi Raita',
      'menu_id' => $menu_id,
      'user_id' => 1,
      'image_url' => 'https://photo.foodgawker.com/wp-content/uploads/2013/04/1310004.jpeg',
      ]);
      $menu_id = \App\Menu::where('menu_type','=','Naan')->pluck('id');
      DB::table('recipes')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'recipe_name' => 'Garlic Naan',
      'menu_id' => $menu_id,
      'user_id' => 1,
      'image_url' => 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcQMs89yBUWBiIfjO78oZEXE8hvT3_GOd3wgs_YVy3kxcjqKM9Ml',
      ]);

    }
}
