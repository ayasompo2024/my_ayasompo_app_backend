@extends('admin.layout.app')
@section('content')
    <div class="container bg-white pb-4">
        <nav class="pt-3 pl-3">
            Admin / All
            <span class="badge bg-info ml-2">{{ $users->total() }}</span>
            <div class="float-right">
                <a class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#new">
                    <i class="bi bi-plus-square pr-2"></i> Add Account
                </a>
            </div>
        </nav>
        @include('admin.validation-error-alert')
        <div class="bg-white px-md-3 mt-2 pt-3 mt-2 " style="min-height: 50vh">
            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-info">
                        <tr>
                            <th class="p-2" style="min-width: 140px">No</th>
                            <th class="p-2" style="min-width: 140px">Name</th>
                            <th class="p-2" style="min-width: 200px">Email</th>
                            <th class="p-2" style="min-width: 200px">Role</th>
                            <th class="p-2" style="min-width: 140px">Created</th>
                            <th class="p-2" style="min-width: 140px">Status</th>
                            <th class="p-2" style="min-width: 140px">Section</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $item)
                            <tr style="font-size: 15px">
                                <td class="p-1">
                                    {{ ++$key }}
                                </td>
                                <td class="p-1">
                                    {{ $item->name }}
                                </td>
                                <td class="p-1">
                                    {{ $item->email }}
                                </td>
                                <td class="p-1">
                                    {{ ucfirst($item->role) }}
                                </td>
                                <td class="p-1">
                                    {{ $item->created_at }}
                                </td>
                                <td class="p-1">
                                    @if ($item->status == 1)
                                        <span class="badge bg-info">Active</span>
                                    @else
                                        <span class="badge bg-warning">Disabled</span>
                                    @endif
                                </td>
                                <td class="p-1">
                                    <form action="{{ route('admin.account.disabled.toggle', $item->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-sm bg-ligth border">
                                            @if ($item->status == 1)
                                                Make Disabled
                                            @else
                                                Make Active
                                            @endif
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="float-right pb-3">
            <p class="">
                {!! $users->links('pagination::bootstrap-4') !!}
            </p>
        </div>
    </div>
    <div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="newShopType"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="post" action="">
                        @csrf
                        <div class="modal-header p-3">
                            <h6 class="modal-title" id="newShopType">Add New  </h6>
                        </div>
                        <div class="modal-body mt-0">
                            <label>Name</label>
                            <input type="text" name="name" required class="form-control form-control-sm  price"
                                placeholder="Name  " />
                        </div>
                        <div class="modal-footer p-1 border-0">
                            <input type="submit" class="btn btn-sm bg-info" value="submit">
                            <button type="button" class="btn btn-sm bg-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
