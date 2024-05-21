@extends('admin.layout.app')
@section('content')
    <div class="container">
        <div class="p-3">
            LeaderBoard
            <a data-toggle="modal" data-target="#AddAgentUser" style="background:#ce123c" href="#"
                class="btn btn-sm float-right btn-danger">
                <i class="bi bi-plus-square pr-2"></i> Upload
            </a>
        </div>
        @include('admin.validation-error-alert')
        <div class="mt-3 mb-5">
            <div class="bg-light px-3 pb-5 pt-4 ">
                <table class="table table">
                    <thead>
                        <tr>
                            <th class="p-1">#</th>
                            <th class="p-1">Profile</th>
                            <th class="p-1">Name</th>
                            <th class="p-1">Name</th>
                            <th class="p-1">Point</th>
                            <th class="p-1">Edit</th>
                            <th class="p-1">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($leaders as $index => $leader)
                            <tr>
                                <td class="p-1">{{ ++$index }}</td>
                                <td class="p-1">
                                    @if ($leader->profile)
                                        <img src="{{ $leader->profile->profile_photo }}" width="25px"
                                            style="object-fit: cover;aspect-ratio:1/1">
                                    @else
                                        <small class="badge bg-white text-danger">Agent Profile Not Found</small>
                                    @endif

                                </td>
                                <td class="p-1">
                                    {{ $leader->phone }}
                                </td>
                                <td class="p-1">
                                    {{ $leader->name }}
                                </td>
                                <td class="py-1 pl-1 pr-4" style="position:relative">
                                    {{ number_format($leader->points) }}
                                    <span class="pl-2">
                                        @if ($index == 1)
                                            <i class="bi bi-trophy-fill"></i>
                                        @endif
                                        @if ($index == 2)
                                        @endif
                                        @if ($index == 3)
                                        @endif
                                    <span>
                                </td>
                                <td class="p-1">
                                    <a href="{{ route('admin.leaderboard.edit', $leader->id) }}">
                                        <button type="submit" class="btn btn-sm py-0 px-1  bg-white" style="height:25px">
                                            <i class="bi bi-pencil-square text-danger"></i>
                                        </button>
                                    </a>
                                </td>
                                <td class="p-1">
                                    <form class="p-0 m-0"
                                        action="{{ route('admin.leaderboard.destroy', $leader->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <div class="p-0 m-0">
                                            <button type="submit" class="btn btn-sm py-0 px-1  bg-white"
                                                style="height:25px">
                                                <i class="bi bi-trash-fill text-danger"></i>
                                            </button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


<div class="modal fade" id="AddAgentUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.leaderboard.store') }}" method="post" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-header p-2">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Agent User</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body px-3 py-3">
                    <div class="form-group">
                        <input name="leaderboard" type="file" class="btn btn-sm border p-1 w-100 inputfile"
                            accept=".xls, .xlsx" required>
                    </div>
                </div>
                <div class="modal-footer p-2">
                    <a href="{{ route('admin.file.download', 'LeaderBoardTemplate2.xlsx') }}"
                        class="btn btn-sm btn-danger float-left">
                        Download Template &nbsp;
                        <i class="bi bi-cloud-arrow-down-fill"></i>
                    </a>
                    <button type="submit" class="btn btn-sm btn-danger">
                        Upload
                        <i class="bi bi-arrow-right-circle-fill ml-1"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('child-css')
    <style>
        input[type=file]::file-selector-button {
            border: 0;
            background: #ce123c;
            padding: 5px;
            border-radius: 3px;
            color: #fff;
            cursor: pointer;
            transition: background .2s ease-in-out;
        }

        input[type=file]::file-selector-button:hover {
            background: #0d45a5;
        }
    </style>
@endpush
