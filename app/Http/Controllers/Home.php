<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Input;

class Home extends Controller
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
        $this->unify();
        //shows the feeds homepage
        //checks if user is logged in
        $user = session('user');

        $data = [
            'page' => 'home',
            'user' => $user
        ];

        return view('home', $data);
    }

    //for loading specific feeds
    public function feed()
    {

        //gets the data from the ajax call
        $posts = Input::post('data', []);

        foreach($posts as $key => $post){

            //decode the json_metadata
            $metaData = json_decode($post['json_metadata'], TRUE);

            $posts[$key]['cover'] = (isset($metaData['image'][0]))?$metaData['image'][0]:'';
            $posts[$key]['tags'] = (isset($metaData['tags']))?$metaData['tags']:'';

            //extract all voters and put in an array
            $voters = [];

            //make sure array isn't empty
            if (!empty($post['active_votes'])){

                foreach($post['active_votes'] as $voter){

                    //create new array and put them inside
                    $voters[] = $voter['voter'];
                }

            }
            $posts[$key]['voters'] = $voters;
        }

        //checks if user is logged in
        $user = session('user');

        $data = [
            'posts' => $posts,
            'user' => $user
        ];

        //show view
        return view('feed', $data);
    }

    //for loading post
    public function post($url = null)
    {
        $this->unify();

        //use link to get json feed for post
        $url = "http://localhost/sportshub/api/index.php/api/posts/content?link=".$url;
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

        //extract all voters and put in an array
        $voters = [];

        //make sure array isn't empty
        if (!empty($jsonData->post->active_votes)){

            foreach($jsonData->post->active_votes as $voter){

                //create new array and put them inside
                $voters[] = $voter->voter;
            }

        }
        //build view parameters
        $user = session('user');

        $data = [
            'user' => $user,
            'postData' => $jsonData->post,
            'voters' => $voters
        ];

        //show view
        return view('post', $data);


    }

    public function comments(){

        //gets the data from the ajax call
        $comments = Input::post('data', []);

        foreach($comments as $key => $comment){

            //decode the json_metadata
            $metaData = json_decode($comment['json_metadata'], TRUE);

            $comments[$key]['cover'] = (isset($metaData['image'][0]))?$metaData['image'][0]:'';
            $comments[$key]['tags'] = (isset($metaData['tags']))?$metaData['tags']:'';
        }

        $data = [
            'comments' => $comments
        ];

        //show view
        return view('comments', $data);
    }

    public function predictions(){

        $this->unify();

        //retrieve latest matches and scores
        //use link to get json feed for post
        $url = "https://apifootball.com/api/?action=get_events&from=2018-05-01&to=2018-05-21&league_id=63&APIkey=85ebfffb4cba20230d3951a9aeccf7f2c5d0250829b483ee930daf8b35dbab7b";
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
        $jsonData = json_decode($jsonData);

        //dd($jsonData);

        //build view parameters
        $user = session('user');

        $data = [
            'page' => 'prediction',
            'user' => $user
        ];

        //show view
        return view('predictions', $data);
    }
}