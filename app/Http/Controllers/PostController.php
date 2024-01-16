<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    private $post;
    private $category;
    public function __construct(Post $post, Category $category)
    {
        $this->post = $post;
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $all_categories = $this->category->all();

        return view('users.post.create')->with('all_categories',$all_categories);


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->post->user_id = Auth::user()->id;
        $this->post->description = $request->description;
        // convert image to text and save it to database : convert it into base:64 text
        $this->post->image = 'data:image/' . $request->image->extension() .
        ';base64,' . base64_encode(file_get_contents($request->image));
        // return $request->category;
        $this->post->save(); // it will generate ID after saving


        #create a array that would accept the categories inside the form
        foreach($request->category as $category_id){
            $category_post[] = ["category_id"=>$category_id];
        }

        $this->post->categoryPost()->createMany($category_post);

        return redirect()->route('index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
