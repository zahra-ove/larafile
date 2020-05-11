@extends('admin.layout.master')

@section('title', 'لیست مقالات')

@section('content')

    @include('admin.layout.notifications')

    <div class="row">
        <div class="col-3">
            <a href="{{route('admin.articles.create')}}" class="btn btn-outline-success btn-xs"><i class="fas fa-plus ml-1"></i> ایجاد مقاله جدید</a>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12  mx-auto">
            <table class="table table-bordered  text-center table-hover">
                <thead>
                    <tr>
                        <th>شماره</th>
                        <th>عنوان مقاله</th>
                        <th>متن مقاله</th>
                        <th>Slug</th>
                        <th>نویسنده</th>
                        <th>تعداد بازدید</th>
                        <th>نام دسته</th>
                        <th>تاریخ ایجاد</th>
                        <th>تاریخ بازنگری</th>
                        <th>تنظیمات</th>
                    </tr>
                </thead>

                @if(isset($articles)  &&  ($articles->count() > 0) )

                    <tbody class="">
                        @foreach($articles as $article)
                            <tr>
                                <td>{{$article->id}}</td>
                                <td>{{$article->title}}</td>
                                <td>{!! $article->brief_body !!}</td>
                                <td>{{$article->slug}}</td>
                                <td>{{$article->user->fullname}}</td>
                                <td>{{$article->view_count}}</td>
                                <td>@if(isset($article->category->name)) {{$article->category->name}} @endif</td>
                                <td style="font-size:12px;">{{jdate($article->created_at)->format('%d %B %Y')}}</td>
                                <td style="font-size:12px;">{{jdate($article->updated_at)->format('%d %B %Y')}}</td>

                                {{-- <td>
                                    @if($article->images->count() > 0)
                                       <img src="{{asset($article->images->first()->image_path. '/' .$article->images->first()->image_name)}}" alt="" style="width:50px;height:50px;">
                                    @endif
                                </td> --}}
                                <td>
                                    <div class="btn btn-group">
                                        <a href="{{route('admin.articles.edit', ['article' => $article])}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>

                                        <form action="{{route('admin.articles.destroy', ['article' => $article])}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt" style="color: black;"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                @else

                    <tr>
                        <td colspan="10"><p>هیچ مقاله ایی وجود ندارد...</p></td>
                    </tr>

                @endif

            </table>
        </div>
    </div>
@endsection
