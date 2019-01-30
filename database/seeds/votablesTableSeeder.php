<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Question;
use App\Answer;
class votablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('votables')->delete();

        $users = User::all();
        $numUsers= $users->count();
        $votes =[-1, 1];

        foreach(Question::all() as $question){

            for($i=0; $i< rand(1, $numUsers); $i++){

                $user =$users[$i];

                $user->VoteQuestion($question, $votes[rand(0,1)]);
            }

        }

        foreach(Answer::all() as $answer){

            for($i=0; $i< rand(1, $numUsers); $i++){

                $user =$users[$i];

                $user->VoteAnswer($answer, $votes[rand(0,1)]);
            }

        }
    }
}
