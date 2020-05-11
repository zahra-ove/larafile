<div class="container-fluid pt-3" dir="rtl" style="background-color:rgba(211, 211, 211, 0.24);">
    <div class="row justify-content-center pt-3">
        <h6 class="px-5 py-2 mb-4" style="background-color:#9d5981;color:white;">سایر نظرات</h6>
    </div>

    @if($comments->count() > 0)
        @foreach($comments as $comment)
            @if($comment->approved == 1)
                <div class="row justify-content-center commentParent">
                    <div class="col-6 shadow bg-white mb-4 p-2" style="border-radius: 10px;">
                        <div class="comment-parent">
                            <div class="comment-header d-flex">
                                <span class="commentID d-none">{{$comment->id}}</span>
                                <span class="m-2 font-weight-bold">{{$comment->name}}</span>
                                <span class="text-muted flex-grow-1 my-auto" style="font-size:11px;">{{jdate($comment->created_at)->ago()}}</span>
                                <a class="float-right text-white p-1 replyBtn my-auto" data-id="{{$comment->id}}">پاسخ<i class="fas fa-reply ml-1"></i></a>
                            </div>
                            <div class="comment-body px-2 py-4" id="commentBody_{{$comment->id}}">
                                {{$comment->body}}
                            </div>

                            @auth
                                @if($comment->user_id == Auth::id())
                                <div class="comment-footer mb-3 pb-2">
                                    <div class="dropdown d-inline dropup">

                                        <a href="" class="float-right dropdown-toggle pl-2 mt-1" role="button" data-toggle="dropdown" id="dropdownMenuLink" aria-expanded="false"><i class="fas fa-ellipsis-h text-muted"></i></a>

                                        <div class="dropdown-menu text-left" aria-labelledby="dropdownMenuLink" style="border-radius:10px;">
                                            {{-- <a href="{{route('comment.update',  ['comment' => $comment])}}" class="dropdown-item">ویرایش</a> --}}
                                            <a class="dropdown-item editComment">ویرایش</a>
                                            {{-- <a href="{{route('comment.destroy', ['comment' => $comment])}}" class="dropdown-item" >حذف</a> --}}
                                            <a class="dropdown-item deleteComment" >حذف</a>
                                        </div>

                                    </div>
                                </div>
                                @endif
                            @endauth

                        </div>

                        @foreach ($comment->comments as $reply)
                            @if($reply->approved == 1)
                                <div class="comment-child">

                                    <div class="replyComment-header d-flex">
                                        <span class="replyCommentID d-none">{{$reply->id}}</span>
                                        <span class="m-2 font-weight-bold">{{$reply->name}}</span>
                                        <span class="text-muted flex-grow-1 my-auto" style="font-size:11px;">{{jdate($reply->created_at)->ago()}}</span>
                                    </div>

                                    <div class="replyComment-body px-2 py-4" id="replyComment_{{$reply->id}}">
                                        {{$reply->body}}
                                    </div>

                                    @auth
                                        @if($reply->user_id == Auth::id())
                                            <div class="replyComment-footer">
                                                <div class="dropdown d-inline dropup">

                                                    <a href="" class="float-right dropdown-toggle pl-2 my-auto" role="button" data-toggle="dropdown" id="dropdownMenuLink" aria-expanded="false"><i class="fas fa-ellipsis-h text-muted"></i></a>

                                                    <div class="dropdown-menu text-left" aria-labelledby="dropdownMenuLink" style="border-radius:10px;">
                                                        {{-- <a href="{{route('comment.update',  ['comment' => $comment])}}" class="dropdown-item">ویرایش</a> --}}
                                                        <a class="dropdown-item editReplyComment">ویرایش</a>
                                                        {{-- <a href="{{route('comment.destroy', ['comment' => $comment])}}" class="dropdown-item" >حذف</a> --}}
                                                        <a class="dropdown-item deleteReplyComment" >حذف</a>
                                                    </div>

                                                </div>
                                            </div>
                                        @endif
                                    @endauth
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    @else
        <div class="row justify-content-center mb-2" >
            <div class="col-6" style="border:1px solid lightgray;">
                <p class="pt-2 text-center">دیدگاهی ثبت نشده است.</p>
            </div>
        </div>
    @endif

</div>


<!--**************************************** Modals Section start ********************************************-->
{{-- Edit Modal start --}}
<div class="modal fade" id="editModal"  tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title d-inline" id="editModal">ویرایش دیدگاه</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form>
                {{-- @csrf --}}
                <input type="hidden" class="commentId" value="">   <!-- stores comment id  -->

                <div class="form-group">
                    <label for="editCommentBody">پیام شما</label>
                    <textarea  class="editCommentBody" id="editCommentBody" name="body" rows="4" cols="50" dir="rtl"></textarea>
                    <span class="text-danger p-1" id="body" role="alert" style="font-size:12px;"></span>
                </div>

            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn p-2" style="background-color:rgba(56, 55, 55, 0.685)" data-dismiss="modal">برای بعد</button>
            <button type="button" class="btn btn-primary p-2 mr-2 editBtn">ذخیره</button>
        </div>
    </div>
    </div>
</div>
{{-- Edit Modal end --}}


{{-- Delete Modal start --}}
<div class="modal fade" id="deleteModal"  tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title d-inline" id="deleteModal">حذف دیدگاه</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <p>؟آیا میخواهید این دیدگاه حذف شود</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn p-2" style="background-color:rgba(56, 55, 55, 0.685)" data-dismiss="modal">خیر</button>
                <button type="button" class="btn btn-primary p-2 mr-2 deleteBtn">حذف شود</button>
            </div>

        </div>
    </div>
</div>
{{-- Delete Modal end --}}


{{-- Reply Modal start --}}
<div class="modal fade" id="replyModal"  tabindex="-1" role="dialog" aria-labelledby="replyModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title d-inline" id="replyModal">پاسخ به دیدگاه</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form>
                    {{-- @csrf --}}
                    {{-- <input type="hidden" class="commentable_type" data-type="{{$commentable_type}}"> --}}

                    <div class="form-group">
                        <label for="name">نام</label>
                        <input type="text" name="name" id="replyName" class="form-control" value="">
                        <span class="text-danger p-1" id="name" role="alert" style="font-size:12px;"></span>

                    </div>

                    <div class="form-group">
                        <label for="email">ایمیل</label>
                        <input type="email" name="email" id="replyEmail" class="form-control" value="">
                        <span class="text-danger p-1" id="email" role="alert" style="font-size:12px;"></span>
                    </div>

                    <div class="form-group">
                        <label for="replyBody">پاسخ شما به این دیدگاه</label>
                        <textarea  class="form-control" id="replyBody" name="body" rows="4" cols="50" dir="rtl">{{''}}</textarea>
                        <span class="text-danger p-1" id="body" role="alert" style="font-size:12px;"></span>

                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn p-2" style="background-color:rgba(56, 55, 55, 0.685)" data-dismiss="modal">برای بعد</button>
                <button type="button" class="btn btn-primary p-2 mr-2 replyBtnModal">ارسال</button>
            </div>

        </div>
    </div>
</div>
{{-- Reply Modal end --}}
<!--**************************************** Modals Section end ********************************************-->
