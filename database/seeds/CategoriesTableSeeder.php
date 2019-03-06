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
                'title' => 'Math',
                'slug' => 'math'
            ],
            [
                'title' => 'English',
                'slug' => 'english'
            ],
            [
                'title' => 'Physics',
                'slug' => 'physics'
            ],
            [
                'title' => 'Physics',
                'slug' => 'physics'
            ],
            [
                'title' => 'Physics',
                'slug' => 'physics'
            ],
            [
                'title' => 'Chemistry',
                'slug' => 'chemistry'
            ],
            [
                'title' => 'Biology',
                'slug' => 'biology'
            ],

            [
                'title' => 'History',
                'slug' => 'history'
            ],
            [
                'title' => 'Economics',
                'slug' => 'economics'
            ],
            [
                'title' => 'Health',
                'slug' => 'health'
            ],
            [
                'title' => 'Computer Science',
                'slug' => 'computer'
            ],
            [
                'title' => 'Physical Education',
                'slug' => 'physical'
            ],
        ]);

//        // update the posts data
//        foreach (Question::pluck('id') as $qztId)
//        {
//            $categories = Category::pluck('id');
//            $categoryId = $categories[rand(0, $categories->count()-1)];
//
//            DB::table('questions')
//                ->where('id', $qztId)
//                ->update(['category_id' => $categoryId]);
//        }
    }
}
