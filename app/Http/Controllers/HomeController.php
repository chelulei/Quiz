<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
class HomeController extends Controller
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

        $user = Auth::user();
        $questions=Question::with('user')
            ->latestFirst()
            ->filter(request('term'))
            ->paginate($this->limit);
        $categories= Category::all();

        return view('home',compact('questions','categories','user'));

    }


}
