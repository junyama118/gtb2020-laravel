<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserListController extends Controller
{
    //
    public function get_userlist(){
        $users = User::all();
        return view('list')->with('users',$users);
    }
}
