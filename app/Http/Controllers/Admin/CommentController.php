<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::where('approved', 1)->get();

        return view('admin.comments.index', compact('comments'));
    }


        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function unapprovedComments()
    {
        $comments = Comment::where('approved', 0)->get();

        return view('admin.comments.unapproved', compact('comments'));
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment =Comment::find($id);
        $comment->delete();

        alert()->success('این دیدگاه با موففیت حذف شد.','بریم ...!');

        return redirect()->back();
    }


    /**
     * approve the specified comment
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approve($id)
    {
        $comment = Comment::find($id);

        $comment->update(['approved' => 1]);

        alert()->success('این دیدگاه با موففیت تایید شد.','بریم ...!');

        return redirect()->back();
    }


}
