<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Input;

class Login extends Controller
{

    public function index()
    {

        //show view
        $message = session('message');
        $data = ($message !== null)?['message' => [
                'type' => $message['type'],
                'body' => $message['body']
            ]]:[];

        $user = session('user');
        $data['user'] = $user;

        return view('login/index', $data);
    }

    public function login(Request $request){

        //gets the data from the form submit
        $email = Input::post('email', []);

        //check if user email already exists
        $user = DB::table('users')->where('email', $email)->first();

        if($user !== NULL){

            //checks for the password
            if($user->password == hash('gost', Input::post('password'))){

                //**password correct**
                //save user data to session for use everywhere
                session(['user' => $user]);

                //save user data to session and redirect to dashboard
                return redirect('/');
            }
            else{

                //save message in session
                $message = [
                    'type' => 'warning',
                    'body' => 'Wrong password used for email'
                ];

                $request->session()->flash('message', $message);

                return redirect('login');
            }

        }
        else{

            //email already exists
            //save message in session
            $message = [
                'type' => 'warning',
                'body' => 'Email does not exist'
            ];

            $request->session()->flash('message', $message);

            return redirect('login');
        }
    }
}