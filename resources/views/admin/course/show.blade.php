@extends('admin.layouts.app')

@section('title', 'course Show')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('common.page_header', [
        'page_title' => 'Show Course',
        'breadcrumbLinks' => [
                ['label' => 'Courses', 'link' => '/courses']
            ]
    ])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card p-2">
                            <h2>
                                {{ $course->title }}
                            </h2>
                            <h3>{{ $course->price }}</h3>
\
                            <p>{{ $course->description }}</p>
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
