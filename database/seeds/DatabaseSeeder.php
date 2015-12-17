<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
          $this->call(MenusTableSeeder::class);
          $this->call(UsersTableSeeder::class);
          $this->call(RecipesTableSeeder::class);
          $this->call(SpecificsTableSeeder::class);
          $this->call(RecipeSpecificTableSeeder::class);

        Model::reguard();
    }
}
