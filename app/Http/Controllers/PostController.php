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
        $this->post->image  = 'data:image/' . $request->image->extension() .
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
    public function show($id)
    {
        //

        $post = $this->post->findOrFail($id);

        return view('users.post.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //

        $all_categories = $this->category->all();
        $post = $this->post->findOrFail($id);

        $selected_categories = []; //we put the selected categories of this post
        foreach($post->categoryPost as $category_post){
            $selected_categories[] = $category_post->category_id;
        }
        return view('users.post.edit')
                ->with('post',$post)
                ->with('all_categories',$all_categories)
                ->with('selected_categories',$selected_categories);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //


        $post = $this->post->findOrFail($id);
        $post->description = $request->description;
        if($request->image){
            $post->image  = 'data:image/' . $request->image->extension() .
            ';base64,' . base64_encode(file_get_contents($request->image));
        }

        $post->save();

        $post->categoryPost()->delete();

        foreach($request->category as $category_id){
            $category_post[] = ["category_id"=>$category_id];
        }

        $post->categoryPost()->createMany($category_post);

        return redirect()->route('post.show',$id);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //

        $this->post->destroy($id);

        return redirect()->route('index');
    }
}
