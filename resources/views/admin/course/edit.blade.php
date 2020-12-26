@extends('admin.layouts.app')

@section('title', 'Course Edit')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('common.page_header', [
        'page_title' => 'Edit Course',
        'breadcrumbLinks' => [
                ['label' => 'Courses', 'link' => '/Courses']
            ]
    ])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card p-2">
                            <form action="{{ route('courses.update', $course) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Title:</label>
                                            <input type="text" class="form-control"
                                                   id="title"
                                                   name="title"
                                                   value="{{ $course->title }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="description">Description:</label>
                                            <input type="text"
                                                   class="form-control"
                                                   id="description"
                                                   name="description"
                                                   value="{{ $course->description }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="category">Category:</label>
                                            <input type="text"
                                                   class="form-control"
                                                   id="category"
                                                   name="category"
                                                   value="#">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="price">Price:</label>
                                            <input type="text"
                                                   class="form-control"
                                                   id="price"
                                                   name="price"
                                                   value="{{ $course->price }}">
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
