<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

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
    public function show($id)
    {
        //
        $post=Post::where('id',$id)->get()->first();
        $description=Storage::disk('local')->get($post->description);
        $requirement=Storage::disk('local')->get($post->requirement);
        return view('job')->with(['post'=>$post,
            'description'=>str_replace("\n",'<br>',htmlentities($requirement)),
            'requirement'=>str_replace("\n",'<br>',htmlentities($requirement)),]);
    }
}
