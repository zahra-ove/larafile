@extends('admin.layout.master')

@section('title', 'لیست کاربران')

@section('content')

    @include('admin.layout.notifications')



    @if(isset($users)  &&  ($users->count() > 0) )
        <div class="row">
            <div class="col-9  mx-auto">
                <table class="table table-bordered table-responsive text-center table-hover">
                    <thead class="font-weight-bold"">
                        <tr>
                            <th>شماره</th>
                            <th>نام و نام خانوادگی</th>
                            <th>نام کاربری</th>
                            <th>ایمیل</th>
                            <th>سن</th>
                            <th>موبایل</th>
                            <th>جنسیت</th>
                            <th>تصویر</th>
                            <th>تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->fullname}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->age}}</td>
                                <td>{{$user->mobile}}</td>
                                <td>{{$user->gender->name}}</td>
                                <td>
                                    @if(is_null($user->image))
                                        {{'No Image'}}
                                    @else
                                        <img src="{{asset($user->image->image_path.'/'.$user->image->image_name)}}" alt="user profile image" style="width:50px;height:50px;">
                                    @endif
                                </td>

                                <td>
                                    <div class="btn btn-group">
                                        <a href="{{route('admin.users.edit', ['user' => $user])}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>

                                        <form action="{{route('admin.users.destroy', ['user' => $user])}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt" style="color: black;"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
