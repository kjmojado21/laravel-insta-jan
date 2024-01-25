<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class FollowController extends Controller
{
    private $follow;
    public function __construct(Follow $follow)
    {
        $this->follow = $follow;
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
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($user_id)
    {
        //
        $this->follow->follower_id = Auth::user()->id;
        $this->follow->following_id = $user_id;

        $this->follow->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Follow $follow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Follow $follow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Follow $follow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user_id)
    {
        //
        $this->follow->where('follower_id',Auth::user()->id)->where('following_id',$user_id)->delete();
// 
        return redirect()->back();
    }
}
