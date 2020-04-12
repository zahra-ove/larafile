@extends('admin.layout.master')

@section('title', 'لیست محصولات')

@section('content')

    @include('admin.layout.notifications')



    @if(isset($files)  &&  ($files->count() > 0) )
        <div class="row">
            <div class="col-12  mx-auto">
                <table class="table table-bordered  text-center table-hover">
                    <thead class="font-weight-bold"">
                        <tr>
                            <th>شماره</th>
                            <th>کد محصول</th>
                            <th>نام محصول</th>
                            <th>قیمت به تومان</th>
                            <th>آدرس ذخیره فایل</th>
                            <th>تعداد دانلود</th>
                            <th>تعداد بازدید</th>
                            <th>نام دسته</th>
                            <th>حجم فایل</th>
                            <th>مدت زمان</th>
                            <th>نوع فایل</th>
                            <th>تصویر</th>
                            <th>تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach($files as $file)
                            <tr>
                                <td>{{$file->id}}</td>
                                <td>{{$file->file_code}}</td>
                                <td>{{$file->file_name}}</td>
                                <td>{{$file->price}}</td>
                                <td>{{$file->file_path}}</td>
                                <td>{{$file->download_count}}</td>
                                <td>{{$file->view_count}}</td>
                                <td>@if(isset($file->category->name)) {{$file->category->name}} @endif</td>
                                <td>{{$file->file_size}}</td>
                                <td>{{$file->time}}</td>
                                <td>@if(isset($file->type->name)) {{$file->type->name}} @endif</td>
                                <td>
                                    @if($file->images->count() > 0)
                                       <img src="{{asset($file->images->first()->image_path. '/' .$file->images->first()->image_name)}}" alt="" style="width:50px;height:50px;">
                                    @endif
                                </td>
                                <td>
                                    <div class="btn btn-group">
                                        <a href="{{route('admin.files.edit', ['file' => $file])}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>

                                        <form action="{{route('admin.files.destroy', ['file' => $file])}}" method="POST">
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
