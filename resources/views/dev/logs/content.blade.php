<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AYA Sompo </title>
    @include('admin.layout.head')
</head>

<body class="sidebar-mini layout-fixed layout-navbar-fixed">
    <div class="wrapper">
        @include('admin.layout.header')
        <?php $sidebar_menus = [];
        ?>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="" class="brand-link tw-flex">
                <h6 class=" font-weight-bold d-inline mt-1 ml-1">Logs</h6>
            </a>
            <div class="sidebar ">
                <nav class="mt-3">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        @foreach ($files as $key => $file)
                            <li class="nav-item ">
                                <div class="nav-link m-0 py-1 d-flex justify-content-between">
                                    <a href="{{ route('dev.logs.file', $file->getFilename()) }}">
                                        <p class="ml-2 p-0">
                                            {{ $file->getFilename() }}
                                        </p>
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper px-2">
            <a class="btn href="{{ url()->previous() }}">
                <i class="bi bi-arrow-left-square"></i>
            </a>
            <pre style=" line-height: 1.6;">{{ $content }}</pre>
        </div>
    </div>
    @include('admin.layout.script')
</body>

</html>
