@extends('admin.layouts.app')

@section('title', 'Teachers List')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('common.page_header', [
        'page_title' => 'All Teachers',
        'breadcrumbLinks' => [
                ['label' => 'Teachers', 'link' => '/teachers']
            ]
    ])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-right p-3">
                        <a href="{{ route('teachers.create') }}" class="btn btn-success">Create</a>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row justify-content-center mb-2">
                                    <div class="col-4">
                                        <form action="{{ route('teachers.index') }}" class="text-center" method="get">
                                            <input type="text"
                                                   name="search"
                                                   class="form-control"
                                                   value="{{ request()->query('search') }}">
                                            <button type="submit" class="btn btn-info m-2">Search</button>
                                            <a href="{{ route('teachers.index') }}" class="btn btn-outline-info m-2">Reset</a>
                                        </form>
                                    </div>
                                </div>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>email</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if (count($teachers) == 0)
                                        <tr>
                                            <td colspan="4" class="text-center">Empty data</td>
                                        </tr>
                                    @else
                                        @foreach($teachers as $teacher)
                                            <tr>
                                                <td>{{ $teacher->id }}</td>
                                                <td>{{ $teacher->name }}</td>
                                                <td>
                                                    {{ $teacher->email }}
                                                </td>
                                                <td>
                                                    <a class="btn btn-info" href="{{ route('teachers.show', $teacher) }}">Show</a>
                                                    <a class="btn btn-primary" href="{{ route('teachers.edit', $teacher) }}">Edit</a>
                                                    <form action="{{ route('teachers.destroy', $teacher) }}" class="d-inline-block" method="post">
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
                                <span>Search result: {{ $teachers->total() }}</span>
                                {{ $teachers->withQueryString()->links() }}
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
