<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use App\Http\Requests;
class UsersController extends Controller
{
    protected $uploadPath;

    public function __construct()
    {
        $this->uploadPath =public_path('img');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('backend.users.index',compact('users'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        $roles = Role::pluck('name','name')->all();
        return view('backend.users.create',compact('roles','user'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\UserStoreRequest $request)
    {

        $data= $this->handleRequest($request);

          $user = User::create($data);


        $user->assignRole($request->input('roles'));


        return redirect()->route('backend.users.index')

            ->with('message','User created successfully');

    }

            private function handleRequest($request){

                $data = $request->all();

                if($request->hasFile('image')){

                    $image = $request->file('image');

                    $filenameWithExt = $image->getClientOriginalName();

                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

                    $extension = $image->getClientOriginalExtension();

                    $fileNameToStore = $filename . '_' . time() . '.' . $extension;

                    $destination = $this->uploadPath;

                    $image->move($destination,$fileNameToStore);

                    $data['image'] =  $fileNameToStore;

                }
                return $data;
            }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('backend.users.show',compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('users.edit',compact('user'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UserUpdateRequest $request, $id)
    {


        $user = User::findOrFail($id);

        $data=$this->handleRequest($request);

        $user->update($data);

        flash('Details updated successfully','success');
        return redirect()->route('backend.account.index');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        User::findOrFail($id)->delete();
        return redirect()->route('backend.users.index')
            ->with('message','User deleted successfully');
    }
}