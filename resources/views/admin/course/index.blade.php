@extends('admin.layouts.app')

@section('title', 'courses List')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('common.page_header', [
        'page_title' => 'All courses',
        'breadcrumbLinks' => [
                ['label' => 'courses', 'link' => '/courses']
            ]
    ])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-right p-3">
                        <a href="{{ route('courses.create') }}" class="btn btn-success">Create</a>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row justify-content-center mb-2">
                                    <div class="col-4">
                                        <form action="{{ route('courses.index') }}" class="text-center" method="get">
                                            <input type="text"
                                                   name="search"
                                                   class="form-control"
                                                   value="{{ request()->query('search') }}">
                                            <button type="submit" class="btn btn-info m-2">Search</button>
                                            <a href="{{ route('courses.index') }}" class="btn btn-outline-info m-2">Reset</a>
                                        </form>
                                    </div>
                                </div>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Image</th>
                                        <th>title</th>
                                        <th>description</th>
                                        <th>category</th>
                                        <th>price</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if (count($courses) == 0)
                                        <tr>
                                            <td colspan="4" class="text-center">Empty data</td>
                                        </tr>
                                    @else
                                        @foreach($courses as $course)
                                            <tr>
                                                <td>{{ $course->id }}</td>
{{--                                                <td><img style="max-width: 50px" src="{{ asset('images/no-image-icon-6.png') }}" alt=""></td>--}}
                                                <td>
                                                    @if ($course->image)
                                                        <img style="max-width: 50px;" src="{{ asset($course->image) }}" alt="">
                                                    @else
                                                        <img style="max-width: 50px" src="{{ asset('images/no-image-icon-6.png') }}" alt="">
                                                    @endif
                                                </td>
                                                <td>{{ $course->title }}</td>
                                                <td class="w-25">
                                                    {{ $course->description }}
                                                </td>
                                                <td><a href="{{ route('categories.show', $course->category) }}">{{ $course->category->name }}</a></td>
                                                <td>{{ $course->price }}</td>
                                                <td>
                                                    <a class="btn btn-info" href="{{ route('courses.show', $course) }}">Show</a>
                                                    <a class="btn btn-primary" href="{{ route('courses.edit', $course) }}">Edit</a>
                                                    <form action="{{ route('courses.destroy', $course) }}" class="d-inline-block" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <span>Search result: {{ $courses->total() }}</span>
                                {{ $courses->withQueryString()->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
