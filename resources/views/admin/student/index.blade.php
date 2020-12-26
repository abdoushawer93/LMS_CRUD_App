@extends('admin.layouts.app')

@section('title', 'Students List')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('common.page_header', [
        'page_title' => 'All Students',
        'breadcrumbLinks' => [
                ['label' => 'Students', 'link' => '/students']
            ]
    ])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-right p-3">
                        <a href="{{ route('students.create') }}" class="btn btn-success">Create</a>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row justify-content-center mb-2">
                                    <div class="col-4">
                                        <form action="{{ route('students.index') }}" class="text-center" method="get">
                                            <input type="text"
                                                   name="search"
                                                   class="form-control"
                                                   value="{{ request()->query('search') }}">
                                            <button type="submit" class="btn btn-info m-2">Search</button>
                                            <a href="{{ route('students.index') }}" class="btn btn-outline-info m-2">Reset</a>
                                        </form>
                                    </div>
                                </div>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>email</th>
                                        <th>Addresses</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if (count($students) == 0)
                                        <tr>
                                            <td colspan="4" class="text-center">Empty data</td>
                                        </tr>
                                    @else
                                        @foreach($students as $student)
                                            <tr>
                                                <td>{{ $student->id }}</td>
                                                <td>{{ $student->name }}</td>
                                                <td>
                                                    {{ $student->email }}
                                                </td>
                                                <td>
                                                    @foreach($student->addresses as $address)
                                                        <p class="alert alert-info">{{ $address->title }}</p>
                                                    @endforeach
                                                </td>

                                                <td>
                                                    <a class="btn btn-outline-primary" href="{{ route('students.address.create', $student) }}">Add New Address</a>
                                                    <a class="btn btn-info" href="{{ route('students.show', $student) }}">Show</a>
                                                    <a class="btn btn-primary" href="{{ route('students.edit', $student) }}">Edit</a>
                                                    <form action="{{ route('students.destroy', $student) }}" class="d-inline-block" method="post">
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
                                <span>Search result: {{ $students->total() }}</span>
                                {{ $students->withQueryString()->links() }}
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
