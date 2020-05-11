@extends('admin.layout.master')

@section('title', 'لیست نظرات')

@section('content')


    @include('admin.layout.notifications')


    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <td>آیدی کامنت</td>
                    <td>آیدی آیتم</td>
                    <td>نوع آیتم</td>
                    <td>متن کامنت</td>
                    <td>نام کاربری</td>
                    <td>نام</td>
                    <td>ایمیل</td>
                    <td>تاریخ انتشار</td>
                    <td>تاریخ بروزرسانی</td>
                    <td>تنظیمات</td>
                </tr>
            </thead>

            <tbody>
                @forelse($comments as $comment)
                    <tr>
                        <td>{{$comment->id}}</td>
                        <td>{{$comment->commentable_id}}</td>
                        <td>{{$comment->commentable_type}}</td>
                        <td>{{$comment->body}}</td>
                        <td>@isset($comment->user->username) {{$comment->user->username}} @endisset</td>
                        <td>{{$comment->name}}</td>
                        <td>{{$comment->email}}</td>
                        <td>{{jdate($comment->created_at)->ago()}}</td>
                        <td>{{jdate($comment->updated_at)->ago()}}</td>
                        <td>
                            <a class="btn btn-danger btn-xs ml-1" style="color:white;" id="btnDelete" data-toggle="modal" data-target="#deleteModal">حذف</a>

                            {{-- <form action="{{route('admin.comments.destroy', ['comment', $comment])}}" method="POST">
                                @method('DELETE')
                                @csrf

                                <a class="btn btn-outline-danger btn-xs">حذف</a>
                            </form> --}}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10"><p>هیچ دیدگاه تایید شده ایی وجود ندارد.</p></td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

  <!-- Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold" id="deleteModalLabel">حذف دیدگاه</h5>
          <button type="button" class="close m-0 p-0" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         دیدگاه حذف شود؟
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
          <form action="{{route('admin.comments.destroy', ['comment' => $comment])}}" method="POST">
                @method('DELETE')
                @csrf
            <button type="submit" class="btn btn-primary">حذف</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
