@extends('admin.layout.master')

@section('title', 'لیست دسته بندی ها')

@section('content')


    @include('admin.layout.notifications')

    @if(isset($categories)  && ($categories->count() > 0) )

        <table class="table table-bordered  text-center table-hover">
            <thead>
                <tr>
                    <th>شماره</th>
                    <th>نام دسته</th>
                    <th>نام دسته والد</th>
                    <th>توضیحات</th>
                    <th>عملیات</th>
                </tr>
            </thead>


            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->parent_id }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{route('admin.categories.edit', ['category' => $category])}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                <form action="{{route('admin.categories.destroy', ['category' => $category])}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt" style="color: black;"></i></button>
                                </form>
                            </div>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
