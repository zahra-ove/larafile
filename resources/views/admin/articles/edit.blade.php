@extends('admin.layout.master')

@section('title', 'ایجاد مقاله جدید')

@section('content')

    @include('admin.layout.notifications')
    <div class="card">
        <div class="card-header text-center" style="background-color: lightseagreen">
            <h2 class="text-white align-middle m-0">اطلاعات مقاله جدید</h2>
        </div>

        <div class="card-body">
            <form action="{{route('admin.articles.update', ['article' => $article])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- first row --}}
                <div class="form-row justify-content-center">
                    <div class="form-group col-3">
                        <label class="control-label" for="title" >عنوان مقاله</label>
                        <input type="text"  name="title"  id="title" class="form-control" value="{{$article->title}}" />
                    </div>

                    <div class="form-group col-3 mr-2">
                        <label class="control-label" for="slug" >Slug</label>
                        <input type="text"  name="slug"  placeholder="example"  id="slug" class="form-control" value="{{$article->slug}}" required/>
                    </div>

                    <div class="form-group col-3 mr-2">
                        <label class="control-label" for="cat" >دسته بندی</label>
                        <select name="category_id" id="cat" class="custom-select">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}"  @if($article->category_id == $category->id) selected   @endif>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{--  second row --}}
                <div class="form-row justify-content-center mt-4">
                    <div class="form-group">
                        <label class="control-label" for="desc_ck" >متن مقاله</label>
                        <textarea name="body" id="desc_ck" cols="30" rows="20">{!! $article->body !!}</textarea>
                    </div>
                </div>

                <!-- third row ---- selecting tags for this file  -->
                <div class="form-group required">
                    <label for="tags" class="col-sm-1 control-label">تگ</label>
                    <select class="tags-list form-control" name="tags[]" id="tags" multiple="multiple">
                        @foreach($tags as $tag)
                            <option value="{{$tag->id}}"  @if($article->tags->pluck('id')->contains($tag->id)) selected @endif>{{$tag->name}}</option>
                        @endforeach
                    </select>
                </div>

                {{-- forth element --}}
                <div class="form-row justify-content-center mt-4">
                    <div  class="form-group ml-2" >
                        <label for="img" class="control-label">آپلود تصویر مقاله</label>
                        <input type="file" name="image" id="img" class="form-control">
                    </div>

                    <div  class="form-group" >
                        <label for="img_type" class="control-label">نوع تصویر</label>
                        <select name="type" id="img_type" class="custom-select">
                            <option value="b">بنر</option>
                            <option value="o">معمولی</option>
                        </select>
                    </div>
                </div>

                @if($article->images->count() > 0)
                    {{-- forth element --}}
                    <div class="mt-4" style="border: 1px solid lightgray">
                        <p class="text-center font-weight-bold mt-2">تصاویر مربوط به این مقاله</p>
                        @foreach($article->images->chunk(4) as $items)
                            <div class="row">
                                @foreach($items as $image)
                                    <div class="col-3" align="center">
                                        <img src="{{asset($image->image_path.'/'.$image->image_name)}}" alt="" style="width:100px;height:100px;"><br/>
                                        <p style="font-size:12px;color:darkblue;">نوع تصویر: {{$image->image_type}}</p>

                                        <button type="button" class="btn btn-outline-danger btn-xs" data-toggle="modal" data-target="#deleteModalBtn">
                                            حذف تصویر
                                        </button>
                                        {{-- <p class="text-center" style="font-size:12px;"> <a href="{{route('admin.image-deletion', ['id' => $image->id])}}">حذف تصویر <i class="fas fa-trash-alt self-" style="color: black;"></i></a></p> --}}
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>



                    <!-- Delete Modal -->
                    <div class="modal fade" id="deleteModalBtn" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="deleteModal">حذف تصویر</h5>
                            <button type="button" class="close ml-0" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            آیا از حذف تصویر مطمئن هستید؟
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                            <a  class="btn btn-primary" href="{{route('admin.image-deletion', ['id' => $image->id])}}">حذف</a>
                            </div>
                        </div>
                        </div>
                    </div>

                @endif

                {{-- Buttons --}}
                <div class="row justify-content-center mt-5">
                    <div class="col-4 text-center">
                        <button type="submit" class="btn btn-secondary btn-sm">ویرایش</button>
                        <a href="{{route('admin.articles.index')}}" class="btn btn-primary btn-sm">بازگشت</a>
                    </div>
                </div>
            </form>
        </div>
    </div>







  @endsection
