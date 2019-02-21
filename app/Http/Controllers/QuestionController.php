<?php
namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use Response;
use Auth;
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
            ->filter(request('term'))
            ->paginate($this->limit);
        $categories=Category::all();
        return view('questions.index',compact('questions','categories'));
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
    public function search(Category $category)
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

//        $input = $request->all();

        if ($validator->fails()) {

            // Store your user in database
            return Response::json(['errors' => $validator->errors()]);
        }else{
            return Response::json(['success' => '1']);
        }



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
        flash('Question has been Update','danger');
        return back();
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
        flash('Question has been deleted successfully!','danger');
        return back();
    }
}