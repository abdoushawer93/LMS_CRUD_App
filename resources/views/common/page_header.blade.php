<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ $page_title }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    @foreach($breadcrumbLinks as $key => $breadcrumbLink)
                        @if (count($breadcrumbLinks) == $key + 1 )
                            <li class="breadcrumb-item active">{{ $breadcrumbLink['label'] }}</li>
                        @else
                            <li class="breadcrumb-item"><a href="{{ $breadcrumbLink['link'] }}">{{ $breadcrumbLink['label'] }}</a></li>
                        @endif
                    @endforeach
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
