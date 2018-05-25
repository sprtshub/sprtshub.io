<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Input;

class Users extends Controller
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

    public function index()
    {

        //shows the feeds homepage
        return view('home');
    }

    public function profile($id = null){

        $this->unify();

        //get user details as json data from api
        //use link to get json feed for post

        //remove the @ from the link
        $id = str_replace('@', '', $id);

        //get user info from database for user
        $userBlck = DB::table('users')->where('steem_username', $id)->first();

        //retrieve user from session
        $user = session('user');

        if ($userBlck !== NULL){

            //get trx history from database for user
            $trxBlck = DB::table('transactions')->where('steem_username', $id)->get();

            $url = "http://localhost/sportshub/api/index.php/api/users/profile?name=".$id;
            $data = [];

            //build http header variables
            $options = array(
                'http' => array(
                    'Content-Type' => 'application/x-www-form-urlencoded; charset=utf-8',
                    'method'  => 'GET',
                    'content' => http_build_query($data)
                )
            );
            $context  = stream_context_create($options);
            $jsonData = file_get_contents($url, false, $context);

            //extract post array
            $jsonData = json_decode(json_decode($jsonData));

            $data = [
                'user' => $user,
                'person' => $jsonData->user,
                'blockchain' => $userBlck,
                'transactions' => $trxBlck
            ];

        }
        else{

            $data = [
                'user' => $user,
                'person' => 'null',
                'blockchain' => 'null',
                'id' => $id
            ];
        }

        //show view
        return view('profile', $data);


    }

    public function accounts(){

        $users = DB::table('users')->get();

        dd($users);
    }

    public function pending(){

        $this->unify();

        //shows the pending posts of user

        //retrieve user from session
        $user = session('user');

        //retrieve pending from database
        $pending = DB::table('posts')->where(['steem_username' => $user->steem_username, 'email' => $user->email, 'approved_by' => NULL])->get();

        //extract tags separately
        foreach($pending as $key => $post){

            $tags = explode(',', $post->tags);

            $post->tags = $tags;
        }

        $data = [
            'user' => $user,
            'pending' => $pending
        ];

        return view('user/pending', $data);
    }

    public function logout(Request $request){

        //clears session
        $request->session()->flush();

        //send user to home
        return redirect('/');
    }

}