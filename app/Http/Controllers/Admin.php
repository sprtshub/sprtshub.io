<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Input;

class Admin extends Controller
{
    public function __construct()
    {
        //View::share('user', $user);
    }

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

    public function index()
    {

        //shows the feeds homepage
        //checks if user is logged in

        $user = session('user');

        $data = [
            'page' => 'home',
            'user' => $user
        ];

        return view('home', $data);
    }

    public function pending(){

        //ensure only logged in users can view create post page
        $this->unify();

        //build view parameters
        $user = session('user');

        if ($user == NULL){

            //redirect out
            return redirect('/');
        }
        else{

            //get the pending posts from db

            //retrieve pending from database
            $pending = DB::table('posts')->where(['approved_by' => NULL])->get();

            //extract tags separately
            foreach($pending as $key => $post){

                $tags = explode(',', $post->tags);

                $post->tags_array = $tags;
            }

            $data = [
                'page' => 'admin_pending',
                'user' => $user,
                'pending' => $pending
            ];

            return view('admin/pending', $data);
        }
    }

    public function approve_post(){

        //ensure only logged in users can view create post page
        $this->unify();

        //build view parameters
        $user = session('user');

        //gets the data from the ajax call
        $id = Input::post('id', []);

        //update the post data with approved information
        DB::table('posts')->where('id', $id)->update(['approved_by' => $user->steem_username, 'earning' => 0.003]);

        //credit the user with sportscoin

        //get user information to credit the user sportscoin
        $post = DB::table('posts')->where('id', $id)->first();
        $person = DB::table('users')->where('steem_username', $post->steem_username)->first();

        //use reputation score to calculate earning for post
        DB::table('users')->where('steem_username', $post->steem_username)->update(['coin_bal' => $person->coin_bal + 0.003]);


        //record transaction history
        DB::table('transactions')->insert([
           'email' => $person->email,
           'steem_username' => $person->steem_username,
           'destination' => $person->steem_username,
           'type' => 'SPC Received',
           'amount' => 0.003,
           'description' => 'You received 0.003 SPC from post',
        ]);
}
}