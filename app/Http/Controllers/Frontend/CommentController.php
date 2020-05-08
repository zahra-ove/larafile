<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\ReplyCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        $newComment = new Comment();

        if(Auth::check()) //if user iss logged in then fill user_id field
        {
            $newComment->user_id = Auth::id();
        }
        $newComment->name = $request->input('name');
        $newComment->email = $request->input('email');
        $newComment->commentable_id = $request->input('commentable_id');
        $newComment->commentable_type = $request->input('commentable_type');
        $newComment->body = $request->input('body');

        $newComment->save();

        alert()->success('پیام شما با موفقیت ثبت شد','از توجه شما سپاسگزاریم');

        return redirect()->back();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommentRequest $request, $id)
    {
        $editedComment        = Comment::find($id);   // first find specified comment
        $editedComment->body  = $request->input('body');
        $result = $editedComment->save();

        if($result)
        {
            $message = "دیدگاه شما با موفقیت ویرایش شد.";
        }else{
            $message = "ویرایش دیدگاه شما با خطا مواجه شد، لطفا مجددا ویرایش نمایید.";
        }

        $body = $editedComment->body;  //sending new comment body

        return response()->json([
                                    'message' => $message,
                                    'body'    => $body
                                ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletedComment = Comment::find($id);
        $result = $deletedComment->delete();

        if($result)
        {
            $message = "دیدگاه شما حذف شد.";
        }
        else
        {
            $message = "حذف دیدگاه با خطا مواجه شد، لطفا مجددا تلاش کنید.";
        }

        return response()->json(['message' => $message]);

    }



    /**
     * Reply to the specified comment
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reply(ReplyCommentRequest $request, $id)
    {
        $parentComment = Comment::find($id);

        if(Auth::check()) //if user iss logged in then fill user_id field
        {
            $user_id = Auth::id();
        }

        $parentComment->comments()->create([
                                                'name'  => $request->input('name'),
                                                'email' => $request->input('email'),
                                                'user_id' => $user_id,
                                                'body' => $request->input('body'),
                                            ]);


        $message = "پاسخ شما به دیدگاه موردنظر با موفقیت ثبت شد.";
        return response()->json(['message' => $message]);
    }



    // //returns all comments to ajax request
    // public function allComments()
    // {
    //     $comments = Comment::all();
    //     // echo $comments;
    //     // echo json_encode(['comments' => $comments]);
    //     // return response()->json(['comments' => $comments]);
    //     $html = view('comment.comment-list', compact('comments'))->render();
    //     // echo $html;
    //     return response()->json([compact('html')]);
    // }



}
