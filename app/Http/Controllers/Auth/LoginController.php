<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Socialite;
use App\User;
use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the $facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from $facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    { try {
        $user = Socialite::driver('facebook')->user();

        $create['name'] = $user->getName();
        $create['email'] = $user->getEmail();
        $create['provider_id'] = $user->getId();


        $userModel = new User;
        $createdUser = $userModel->addNew($create);
        Auth::loginUsingId($createdUser->id);


        return redirect()->route('home');


    } catch (Exception $e) {


        return redirect('login/facebook');


    }

    }


}
