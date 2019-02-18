<?php
namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http;
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
            ->filter(request('term'))
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
    public function store(Requests $request)
    {
        //
//        $request->user()->questions()->create($request->all());
//        flash('Question has been submitted!','success');
//        return back();

        $validator = \Validator::make($request->all(), [
            'category_id' => 'required',
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        $question= new Question();
        $question->category_id=$request->get('category_id');
        $question->title=$request->get('title');
        $question->body=$request->get('body');
        $question->save();

        return response()->json(['success'=>'Question is successfully added']);

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