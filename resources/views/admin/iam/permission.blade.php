@extends('admin.layout.app')
@section('content')
    <div class="container">
        <div class="p-3">
            Permission to <strong>{{ $role->name }}</strong>
        </div>
        @include('admin.validation-error-alert')
        <div class="mb-5 mx-3">
            <div class="bg-light rounded-lg border px-3 pb-3">
                <form method="post" action="{{ route('admin.iam.roles.add.permisssions', $role->id) }}">
                    @csrf
                    <table class="table table p-0">
                        <thead class="p-0">
                            <tr class="p-0">
                                <th class="p-1">Check</th>
                                <th class="p-1">Name</th>
                                <th class="p-1">Route</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $index => $item)
                                <tr>
                                    <td class="p-1">
                                        <input name="permissions[]" value="{{ $item['route'] }}" type="checkbox"
                                            {{ in_array($item['route'], array_column($old_permissions->toArray(), 'route')) ? 'checked' : '' }}>
                                    </td>
                                    <td class="p-1">{{ $item['display'] }}</td>
                                    <td class="p-1">{{ $item['route'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="float-right  badge border-0 bg-danger py-1 px-2">Submit</button>
                    <br>
                </form>
            </div>
        </div>
    </div>
@endsection
