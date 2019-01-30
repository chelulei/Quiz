<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
class AcceptAnswerController extends Controller
{
    //


    public function __invoke(Answer $answer)
    {
        $this->authorize('accept', $answer);
        $answer->question->BestAnswer($answer);

       return back();


    }
}
