<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $post;
    public function __construct( Post $post)
    {
        $this->post = $post;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $all_posts = $this->post->latest()->get();
        $home_posts = [];
        $suggested_users = $this->suggested_users();
        foreach($all_posts as $post){
            if($post->user->isFollowed() || $post->user_id == Auth::user()->id){
                $home_posts[] = $post;
            }
        }
        return view('users.home')
                ->with('all_posts',$home_posts)
                ->with('suggested_users',$suggested_users);
    }
    public function suggested_users(){
        $all_users = User::all()->except(Auth::user()->id);
        $suggested_users = [];

        foreach($all_users as $user){
            if(!$user->isFollowed()){
                $suggested_users[] = $user;
            }
        }

        return $suggested_users;
    }
    // filter the post
    // show suggested users
}
