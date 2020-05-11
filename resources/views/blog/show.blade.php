@extends('layout.master')

@section('content')

<div class="container mt-5">

    <div class="row">
        <img src="{{asset($article->images()->where('type', 'b')->first()->image_path.'/'.$article->images()->where('type', 'b')->first()->image_name)}}" alt="article image" class="card-img-top mx-auto">
    </div>


    <h2 class="mt-5 font-weight-bold text-center" style="color:rgba(39, 38, 38, 0.719);">{{$article->title}}</h2>

    <div class="row mt-3" dir="rtl">
        <span class="ml-3 articleBadge">دسته بندی: {{$article->category->name}}</span>
        <span class="ml-3 articleBadge" style="font-size:12px;">تاریخ انتشار: {{jdate($article->created_at)->ago()}}</span>
        <span class="ml-3 articleBadge" style="font-size:12px;">تعداد بازدید: {{$article->view_count}} بازدید</span>
    </div>
</div>

<div class="container">
    <div class="row mt-4">
        <p>{!! $article->body !!}</p>
    </div>
</div>

<div class="container">
    <div class="row" dir="rtl" style="background-color: rgb(44, 42, 42); min-height:100px;">
        <span style="color:white;padding:35px;"><i class="fas fa-comment mr-2" style="color:white"></i> {{$comments->count()}} دیدگاه</span>
    </div>
</div>
{{-- comment form --}}
    @include('comment.comment-form', ['commentable_type' => get_class($article), 'commentable_id' => $article->id])

<div class="comments-list">
    @include('comment.comment-list', ['comments' => $comments, 'commentable_type' => get_class($article)])
</div>

@endsection
