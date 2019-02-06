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
        DB::table('categories')->delete();
        //
        DB::table('categories')->insert([
            [
                'title' => 'math',
                'slug' => 'math'
            ],
            [
                'title' => 'english',
                'slug' => 'english'
            ],
            [
                'title' => 'swahili',
                'slug' => 'swahili'
            ],
            [
                'title' => 'physics',
                'slug' => 'physics'
            ],
            [
                'title' => 'Freebies',
                'slug' => 'freebies'
            ],
        ]);

        // update the posts data
        foreach (Question::pluck('id') as $qztId)
        {
            $categories = Category::pluck('id');
            $categoryId = $categories[rand(0, $categories->count()-1)];

            DB::table('questions')
                ->where('id', $qztId)
                ->update(['category_id' => $categoryId]);
        }
    }
}
