<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(9);
        // $articles = Article::all();
        // $articles = Article::with('images')->get();
        // return $articles;

        return view('blog.index', compact('articles'));
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->first();
        $comments = $article->comments->sortByDesc('created_at');   // retrieve all parent comments related to this article and order them in a descending way based on "created at" time

        $article->increment('view_count');  // increase view count of this article one
        // $article->view_count++;  // increase view count of this article one
        $article->save();

        return view('blog.show', compact('article', 'comments'));
    }
}
