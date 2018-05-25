<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Input;

class Create extends Controller
{

    //for ensuring user data is concurrent with DB values
    function unify(){

        //checks if user is logged in
        $user = session('user');

        if ($user !== NULL){

            //get new user data
            $user = DB::table('users')->where('email', $user->email)->first();

            //save user data to session for use
            session(['user' => $user]);
        }
    }

    public function post($type = null){

        //ensure only logged in users can view create post page
        $this->unify();

        //build view parameters
        $user = session('user');

        if ($user == NULL){

            //redirect out
            return redirect('/');
        }
        else{

            $data = [
                'user' => $user
            ];

            //show view
            return view('create/post', $data);
        }
    }

    public function post_post($type = null){

        //retrieve user from session
        $user = session('user');

        //creates post in database
        $data = [
            'email' => $user->email,
            'steem_username' => $user->steem_username,
            'title' => Input::post('title', []),
            'body' => Input::post('body', []),
            'tags' => Input::post('tags', []),
            'posting_key' => $user->posting_key
        ];

        DB::table('posts')->insert($data);

        return redirect('user/pending');

    }

}