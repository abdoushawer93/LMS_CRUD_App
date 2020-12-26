@extends('admin.layouts.app')

@section('title', 'Test')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('common.page_header', [
            'page_title' => 'Test page',
            'breadcrumbLinks' => [
                    ['label' => 'test', 'link' => '/test/'],
                    ['label' => 'test test', 'link' => '/test/test']
                ]
        ])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                   <div class="col-12">
                       <div class="card m-2 p-5">
                           Test
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
