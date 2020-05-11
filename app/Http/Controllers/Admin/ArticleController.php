<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Traits\uploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{

    //---------- including traits here -----------------//
    use uploadTrait;
    // -------------------------------------------------//
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        // dd($articles);
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        $user_id = 0;

        if(Auth::check())
        {
            $user_id = Auth::id();
        }


        $newArticle = new Article();
        $newArticle->title        =  $request->input('title');
        $newArticle->body         =  $request->input('body');
        $newArticle->slug         =  $request->input('slug');
        $newArticle->user_id      =  $user_id;
        $newArticle->category_id  =  $request->input('category_id');
        $newArticle->save();


        if($request->hasFile('image'))
        {
            $fileNameToStore = $this->storeImage($request, 'image' ,'public/articles');

            $newArticle->images()->create([
                'image_name' => $fileNameToStore,
                'image_path' => 'storage/articles',
                'type'       => $request->input('type')
            ]);
        }


        return redirect()->route('admin.articles.index')->with('status', 'مقاله با موفقیت ثبت شد.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);   //finding specified article and send it to edit view
        $categories = category::all();    //retrieve all categories
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, $id)
    {
        $editedArticle = Article::find($id);

        $editedArticle->title        =  $request->input('title');
        $editedArticle->body         =  $request->input('body');
        $editedArticle->slug         =  $request->input('slug');
        $editedArticle->category_id  =  $request->input('category_id');
        $editedArticle->save();


        // if there is any image uploaded then store it.
        if($request->hasFile('image'))
        {
            $fileNameToStore = $this->storeImage($request, 'image' ,'public/articles');

            $editedArticle->images()->create([
                'image_name' => $fileNameToStore,
                'image_path' => 'storage/articles',
                'type'       => $request->input('type')
            ]);
        }

        return redirect()->route('admin.articles.index')->with('status', 'مقاله با موفقیت ویرایش شد.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);    //finding article

        if($article->images->count() > 0)    //delete all images related to this article
        {
            foreach($article->images as $image)
            {
                $image->delete();
            }
        }

        $article->delete();   // then delete article

        return  redirect()->route('admin.articles.index')->with('status', 'مقاله موردنظر با موفقیت حذف شد!');
    }
}
