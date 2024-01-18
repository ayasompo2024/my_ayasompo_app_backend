@extends('admin.layout.app')
@section('content')
    <div class="container bg-white pb-4">
        <nav class="pt-3 pl-3">
            Admin / All
            <span class="badge bg-info ml-2">{{ $users->total() }}</span>
            <div class="float-right">
            </div>
        </nav>
        @include('admin.validation-error-alert')
        <div class="bg-white px-md-3 mt-2 mb-5 pt-3 mt-2 ">
            <table class="table ">
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
                            {{++$key}}
                        </td>
                        <td class="p-1">
                            {{$item->name}}
                        </td>
                        <td class="p-1">
                            {{$item->email}}
                        </td>
                        <td class="p-1">
                            {{ucfirst($item->role)}}
                        </td>
                        <td class="p-1">
                            {{$item->created_at}}
                        </td>
                        <td class="p-1">
                            @if ($item->status == 1)
                                <span class="badge bg-info">Active</span>
                            @else
                            <span class="badge bg-warning">Disabled</span>
                            @endif
                        </td>
                        <td class="p-1">
                            <form  action="{{ route('admin.account.disabled.toggle',$item->id) }}" method="post">
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
        <div class="float-right pb-3">
            <p class="">
                {!! $users->links('pagination::bootstrap-4') !!}
            </p>
        </div>
    </div>
@endsection

