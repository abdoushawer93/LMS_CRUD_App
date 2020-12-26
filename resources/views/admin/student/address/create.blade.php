@extends('admin.layouts.app')

@section('title', 'Student Create Address')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('common.page_header', [
        'page_title' => 'Create student',
        'breadcrumbLinks' => [
                ['label' => 'Students', 'link' => '/students']
            ]
    ])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card p-2">
                            <h2>Add Address for: {{ $student->name }}</h2>
                            <ul>
                                @foreach($student->addresses as $address)
                                    <li>{{ $address->title }}</li>
                                @endforeach
                            </ul>
                            <form action="{{ route('students.address.store', $student) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Title:</label>
                                            <input type="text" class="form-control"
                                                   id="title"
                                                   name="title" value="{{ old('title') }}">
                                            <span class="text-danger">
                                                @error('title')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>

                            </form>
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
