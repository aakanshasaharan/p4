<?php

use Illuminate\Database\Seeder;

class RecipeSpecificTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {
      $recipes =[
            'Vegetable Samosa' => ['dryFruits','vegetables','spices','oil', 'paneer'],
            'Thandai' => ['milk','cream','dryFruits', ],
            'Paneer Masala' => ['milk','cream','dryFruits','paneer'],
            'Daal Makhni' => ['cream','spices'],
            'Faluda Malai Kulfi' => ['dryFruits','milk','cream'],
            'Boondi Raita' => ['yogurt', 'vegetables','dryFruits'],
            'Garlic Naan' => ['flour','yogurt','oil']
        ];
        foreach($recipes as $recipe_name => $specifics) {
            $recipe = \App\Recipe::where('recipe_name','like',$recipe_name)->first();

            foreach($specifics as $specificName) {
                $specific = \App\Specific::where('name','LIKE',$specificName)->first();
                $recipe->specifics()->save($specific);
            }

        }
    }
}
