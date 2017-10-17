<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <= 3; $i++) {
            factory(\App\Category::class)->create([
                'parent_id' => $parent_id = factory(\App\Category::class)->create([
                    'parent_id' => $ancestor_id = factory(\App\Category::class)->create()->id,
                ])->id,
            ]);
            factory(\App\Category::class)->create(['parent_id' => $parent_id]);
            $parent_id = factory(\App\Category::class)->create(['parent_id' => $ancestor_id])->id;
            factory(\App\Category::class)->create(['parent_id' => $parent_id]);
            factory(\App\Category::class)->create(['parent_id' => $parent_id]);
        }
    }
}
