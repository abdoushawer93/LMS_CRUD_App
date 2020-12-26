@extends('admin.layouts.app')

@section('title', 'categories List')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('common.page_header', [
        'page_title' => 'All categories',
        'breadcrumbLinks' => [
                ['label' => 'categories', 'link' => '/categories']
            ]
    ])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-right p-3">
                        <a href="{{ route('categories.create') }}" class="btn btn-success">Create</a>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row justify-content-center mb-2">
                                    <div class="col-4">
                                        <form action="{{ route('categories.index') }}" class="text-center" method="get">
                                            <input type="text"
                                                   name="search"
                                                   class="form-control"
                                                   value="{{ request()->query('search') }}">
                                            <button type="submit" class="btn btn-info m-2">Search</button>
                                            <a href="{{ route('categories.index') }}" class="btn btn-outline-info m-2">Reset</a>
                                        </form>
                                    </div>
                                </div>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>description</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if (count($categories) == 0)
                                        <tr>
                                            <td colspan="4" class="text-center">Empty data</td>
                                        </tr>
                                    @else
                                        @foreach($categories as $category)
                                            <tr>
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td class="w-50">
                                                    {{ $category->description }}
                                                </td>

                                                <td>
                                                    <a class="btn btn-info" href="{{ route('categories.show', $category) }}">Show</a>
                                                    <a class="btn btn-primary" href="{{ route('categories.edit', $category) }}">Edit</a>
                                                    <form action="{{ route('categories.destroy', $category) }}" class="d-inline-block" method="post">
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
                                <span>Search result: {{ $categories->total() }}</span>
                                {{ $categories->withQueryString()->links() }}
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
