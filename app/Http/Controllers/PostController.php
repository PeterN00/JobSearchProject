<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts=Post::paginate();
        return view("search")->with(['posts'=>$posts]);
    }
    public function search(Request $request){
        $posts=Post::where(function(Builder $query) use($request){
            return $query->where('position','like',"%{$request->search}%")
            ->orWhere('company_name','like',"%{$request->search}%");
        });
        if($request->city)
            $posts=$posts->where('city_id',$request->city);
        if($request->level)
            $posts=$posts->where('level_id',$request->level);
        $posts=$posts->paginate(15);
        return view('search')->with('posts',$posts);
    }
}
