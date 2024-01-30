<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    //
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function index(){
        $all_users = $this->user->withTrashed()->latest()->paginate(3);

        return view('admin.users.index')
                ->with('all_users',$all_users);
    }
    public function deactivate($id){
        $this->user->findOrFail($id)->delete();

        return redirect()->back();
    }
    public function activate($id){
        $this->user->onlyTrashed()->findOrFail($id)->restore();

        return redirect()->back();
    }
}
