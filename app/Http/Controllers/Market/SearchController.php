<?php

namespace App\Http\Controllers\Market;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use function view;

class SearchController extends Controller
{
    public function index(Request $request) {
        $query = $request->input('query');
        $posts = Post::where('title','like','%'.$query.'%')->get();
        return view('search',['posts'=>$posts]);
    }
}
