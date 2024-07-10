@extends('admin.layout.app')
@section('content')
    <div class="container">
        <div class="p-3">
            Roles
            <a data-toggle="modal" data-target="#AddAgentUser" style="background:#ce123c" href="#"
                class="btn btn-sm float-right btn-danger">
                <i class="bi bi-plus-square pr-2"></i> New Role
            </a>
        </div>
        @include('admin.validation-error-alert')
        <div class="mt-3 mb-5">
            <div class="bg-light px-3 pb-5 pt-4 ">
                <table class="table table">
                    <thead>
                        <tr>
                            <th class="p-1">#</th>
                            <th class="p-1">Name</th>
                            <th class="p-1">Permission</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $index => $item)
                            <tr>
                                <td class="p-1">{{ ++$index }}</td>
                                <td class="p-1">{{ $item->name }}</td>
                                <td class="p-1">
                                    <a type="button" href="{{ route('admin.iam.roles.permisssions', $item->id) }}"
                                        class='btn btn-sm bg-light border'>
                                        <div style=" transform: rotate(-90deg);">
                                            <i class="bi bi-diagram-3-fill "></i>
                                        </div>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal fade" id="AddAgentUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form action="{{ route('admin.iam.roles') }}" method="post" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header p-2">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add Role</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body px-3 py-3">
                            <div class="form-group">
                                <input name="name" type="text" class="form-control form-control-sm border p-1 w-100 "
                                    required>
                            </div>
                        </div>
                        <div class="modal-footer p-2">
                            <button type="submit" class="btn btn-sm btn-danger">
                                Create
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



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
