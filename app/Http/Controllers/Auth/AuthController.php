<?php

namespace App\Http\Controllers\Auth;

use App\Entities\User;
use Validator;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /*
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = new User([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            //'password' => bcrypt($data['password']),
            'confirmation_token' => str_random(60),
        ]);

        $user->save();


        $url = route('confirmation',['email'=>$user->email,'token'=> $user->confirmation_token]);

        Mail::send('emails.welcome', compact('user','url'), function ($m) use ($user) {
            $m->from('tavo198718@gmail.com', 'My favorylinks');

            $m->to($user->email)->subject('Bienvenido!');
        });

        return $user;
    }



    /**
     * Get the path to the login route.
     *
     * @return string
     */
    public function loginPath()
    {
        return route('login');
    }


    /**
     * @return string
     */
    public function redirectPath(){
        return route('admin.users.index');
    }


    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $user = $this->create($request->all());

        return redirect()->route('login')->with('message','Verifica tu cuenta de correo ' . $user->email);
    }



    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function getCredentials(Request $request)
    {
        return [
            'email' => $request->get('email'),
            'password'=>$request->get('password'),
            'active'=> 1,
            'confirmation_token'=> null
        ];

    }


    /**
     * Get the failed login message or email not verify.
     *
     * @return string
     */
    protected function getFailedLoginMessage()
    {

        $user = User::where('email',\Request::only('email'))
            ->where('active',0)->first();
        $password = \Request::only('password');



        if ($user != null){

            extract($password);

            if(\Hash::check($password, $user->password)){

                return \Lang::has('auth.active')
                    ? \Lang::get('auth.active')
                    : 'Active your account.';
            }


        }else{

            return \Lang::has('auth.failed')
                ? \Lang::get('auth.failed')
                : 'These credentials do not match our records.';
        }
    }


    /**
     * @param $email
     * @param $token
     * @return \Illuminate\Http\RedirectResponse
     */

    public function getConfirmation($email,$token)
    {
        $user = User::where('email',$email)->where('confirmation_token',$token)->firstOrFail();
        $user->active = 1;
        $user->confirmation_token = null;
        $user->save();

        return redirect()->route('login')->with('message','email confirmado');
    }


    /**
     * @return mixed
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }


    /**
     * @return string
     */
    public function handleProviderCallback()
    {

        $socialize_user = Socialite::with('facebook')->user();

        $provider_id = $socialize_user->getId(); // unique facebook user id

        $user = User::where('provider_id', $provider_id)->first();

        // register (if no user)
        if (!$user) {
            $user = new User;
            $user->name = $socialize_user->getName();
            $user->email = $socialize_user->getEmail();
            $user->active = 1;
            $user->confirmation_token = null;
            $user->provider_id = $provider_id;
            $user->save();
        }

        // login

        Auth::loginUsingId($user->id);

        return redirect('/');

//        return '<h2>'.$user->getName().'<h2>' . '<img src="'.$user->getAvatar().'">';
//        exit();
    }



}
