<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests;
use App\Entities\User;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{

    /**
     * @param Request $request
     * @return \BladeView|bool|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {

        //dd($request->get('search_user'));

        $users = User::orderBy('id','desc')->paginate(5);
        return view('admin.users.index', compact('users'));
    }


    public function listing(Request $request, $name)
    {
        $users = User::search($name)->orderBy('id','asc')->lists('id','name','email','type');

        if($request->ajax())
        {
            return response()->json($users);

        }

    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }


    /**
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(UserRequest $request)
    {



        $user = new User();

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->confirmation_token = null;
        $user->password = $request->get('password');
        $user->active = 1;
        $user->confirmation_token = null;

        $user->save();

        $url = route('confirmation',['email'=>$user->email,'token'=> $user->confirmation_token]);

        Mail::send('emails.welcome', compact('user','url'), function ($m) use ($user) {
            $m->from('tavo198718@gmail.com', 'My favorylinks');

            $m->to($user->email)->subject('Bienvenido!');
        });


        return redirect()->route('admin.users.index')->with('message','usuario Agregado');
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit',compact('user'));
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->fill($request->all());
        $user->save();


        return redirect()->route('admin.users.index')->with('message','Usuario '.$user->name.' Actualizado exitosamente');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->forceDelete();
        return redirect()->route('admin.users.index')->with('message','Usuario '.$user->name. ' Eliminado con éxito');
    }


    /**
     * Send an e-mail reminder to the user.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function sendEmailReminder(Request $request, $id)
    {
        $user = User::findOrFail($id);

        Mail::send('emails.reminder', ['user' => $user], function ($m) use ($user) {
            $m->from('hello@app.com', 'Your Application');

            $m->to($user->email, $user->name)->subject('Your Reminder!');
        });
    }


}
