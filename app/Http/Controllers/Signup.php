<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Input;

class Signup extends Controller
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

        return view('signup/index', $data);
    }

    public function signup(Request $request){

        //gets the data from the form submit
        $email = Input::post('email', []);

        //gets the data from the form submit
        $key = Input::post('key', []);

        //gets the data from the form submit
        $steemitUsername = Input::post('username', []);

        //checks to validate the posting key
        if ($key[0] == '5'){

            //check if user email already exists
            $user = DB::table('users')->where('email', $email)->first();

            if($user == NULL){

                //removes all whitespaces and converts to lowercase from steemit username
                $steemitUsername = strtolower(preg_replace('/\s+/', '', $steemitUsername));

                //checks for the steemit username
                $user = DB::table('users')->where('steem_username', $steemitUsername)->first();

                if($user == NULL){

                    //register user in database
                    $user = [
                        'email' => $email,
                        'steem_username' => $steemitUsername,
                        'password' => hash('gost', Input::post('password', [])),
                        'posting_key' => Input::post('key', [])
                    ];
                    DB::table('users')->insert($user);

                    //**registration successful**

                    //save user data to session for use everywhere
                    session(['user' => (object)$user]);

                    //save user data to session and redirect to dashboard
                    return redirect('/');
                }
                else{

                    //save message in session
                    $message = [
                        'type' => 'warning',
                        'body' => 'Steemit username has already been used'
                    ];

                    $request->session()->flash('message', $message);

                    return redirect('signup');
                }

            }
            else{

                //email already exists
                //save message in session
                $message = [
                    'type' => 'warning',
                    'body' => 'Email address has already been used'
                ];

                $request->session()->flash('message', $message);

                return redirect('signup');
            }
        }
        else{

            //wrong posting key
            //save message in session
            $message = [
                'type' => 'warning',
                'body' => 'Wrong posting key used'
            ];

            $request->session()->flash('message', $message);

            return redirect('signup');
        }


    }
}