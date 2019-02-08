<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Htt;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Requests;
class QuestionController extends Controller
{
     public function __construct()
     {
         $this->middleware('auth', ['except'=>['index','show']]);
     }
    protected $limit =3;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $questions=Question::with('user')
            ->latestFirst()
//            if($term= request('term')){
//
//                $questions->where('title','LIKE',"%{{$term}}%");
//
//            }
            ->paginate($this->limit);

      return view('questions.index',compact('questions'));


    }

    public function category(Category $category)
    {
        /*title*/
        $categoryName = $category->title;

            $questions=$category
                ->questions()
                ->with('user')
                ->latestFirst()
                ->paginate($this->limit);
        return view('questions.index',compact('questions','categoryName'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $question = new Question();
        return view('questions.create',compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\AskQuestionRequest $request)
    {
        //
        $request->user()->questions()->create($request->all());

        return redirect('/questions')->with('success','Question has been submitted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
        $question->increment('views');

        return view("questions.show", compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $this->authorize("update",$question);
        return view("questions.edit", compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\AskQuestionRequest $request, Question $question)
    {
        //
        $this->authorize("update",$question);
        $question->update($request->only('title','body'));

        return redirect('/questions')->with('success','Question has been Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $this->authorize("delete",$question);
        //
        $question->delete();

        return redirect()->route('questions.index')
            ->with('success','question deleted successfully');
    }
}
