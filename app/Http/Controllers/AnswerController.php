<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question ;
use Illuminate\Http\Request;
use Auth;
class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Question $question, Request $request)
    {
        //
        $id = Auth::user()->id;
        $question->answers()->create($request->validate([
             'body' =>'required']) +
             ['user_id' => $id]);
        return back()->with('success','Your answer has been submitted success fully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question, Answer $answer)
    {
        //
        $this->authorize("update",$answer);

        return view("answers.edit", compact('question','answer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question, Answer $answer){

        $this->authorize('update', $answer);
        $answer->update($request->validate(['body'=>'required']));
        return redirect()->route('questions.show',$question->slug)
            ->with('success','you answer has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question,Answer $answer)
    {
        //
        $this->authorize('delete', $answer);
        $answer->delete();
        return back()->with('success','you answer has been removed');
    }
}
