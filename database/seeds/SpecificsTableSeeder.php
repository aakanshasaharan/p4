<?php

use Illuminate\Database\Seeder;

class SpecificsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $data = ['dryFruits','vegetables','milk','cream','spices','flour','fruits','yogurt','oil' ,'paneer'];
            foreach($data as $specificName) {
                $specific = new \App\Specific();
                $specific->name = $specificName;
                $specific->save();
            }
  }

}
