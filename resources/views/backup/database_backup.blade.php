@extends('admin.layout.app')
@section('content')
<div class="container">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent m-0">
            <li class="breadcrumb-item active p-0" aria-current="page">BackUp Database</li>
        </ol>
    </nav>
    <a href="{{ route('admin.backup.database.all')}}" class="btn btn-info btn-sm ml-3">
        Backup Now
    </a>
    <a href="{{ route('admin.backup.database.show_backup_file')}}" class="btn btn-info btn-sm ml-3 float-right">
        <i class="bi bi-arrow-clockwise"></i>
    </a>
    <div class="bg-light px-md-3  mt-2 mb-5">
        <table class="table table-responsive-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th style="min-width: 200px">Name</th>
                    <th style="min-width: 200px">Size</th>
                    <th style="min-width: 100px">Date</th>
                </tr>
            </thead>
            <tbody>
                {{-- dd($sql_file); --}}
                @foreach ($sql_file as $index => $item )
                <tr>
                    <td>{{$index+1}}</td>
                    <td>{{$item->getFilename()}}</td>
                    <td>
                        {{$item->getSize() / 1000}} KB

                    </td>
                    <td>
                        {{date('Y-m-d H:i:s', $item->getCTime())}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection