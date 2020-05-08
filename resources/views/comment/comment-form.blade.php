<div class="container-fluid " dir="rtl" style="background-color:rgba(211, 211, 211, 0.24);">
    @include('layout.notifications')
    <div class="row justify-content-center pt-3">
        <h6 class="px-5 py-2" style="background-color:#9d5981;color:white;">نظر شما</h6>
    </div>
    <div class="row justify-content-center">
        <div class="col-6 p-5" style="border:1px solid rgba(211, 211, 211, 0.664);">
            <form action="{{route('comment.store')}}" method="POST">
                @csrf

                <input type="hidden" name="commentable_type" value="{{$commentable_type}}">
                <input type="hidden" name="commentable_id" value="{{$commentable_id}}">



                <div class="form-group">
                    <label for="name">نام</label>
                    <input type="text" id="name" name="name"  class="form-control" value="@auth {{Auth::user()->fullname}} @endauth">
                </div>

                <div class="form-group">
                    <label for="email">ایمیل</label>
                    <input type="email" id="email" name="email"  class="form-control" value="@auth {{Auth::user()->email}} @endauth">
                </div>

                <div class="form-group">
                    <label for="body">پیام شما</label>
                    <textarea  id="body" name="body" rows="4" cols="50"></textarea>
                </div>

                <input type="submit" value="ثبت نظر" class="btn btn-success px-2">
            </form>
        </div>
    </div>

</div>
