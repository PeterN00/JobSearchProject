<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class EmployeeController extends Controller
{
    public function index(){
        $posts=Post::take(9)->get();
        return view('home')->with(['posts'=>$posts]);
    }
}
