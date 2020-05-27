@extends('admin.layout.master')

@section('title', 'لیست تگ ها')

@section('content')

    @include('admin.layout.notifications')

    @if( isset($tags)  &&  ($tags->count() > 0) )
        <div class="row">
            <div class="col-9  mx-auto">
                <table class="table table-bordered table-responsive text-center table-hover">
                    <thead class="font-weight-bold"">
                        <tr>
                            <th>شماره</th>
                            <th>نام تگ</th>
                            <th>توضیحات</th>
                            <th>تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tags as $tag)
                            <tr>
                                <td>{{$tag->id}}</td>
                                <td>{{$tag->name}}</td>
                                <td>{{$tag->description}}</td>

                                <td>
                                    <div class="btn btn-group">
                                        <a href="{{route('admin.tags.edit', ['tag' => $tag])}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>

                                        <form action="{{route('admin.tags.destroy', ['tag' => $tag])}}" method="POST">
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
