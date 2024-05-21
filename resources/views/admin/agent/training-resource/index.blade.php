@extends('admin.layout.app')
@section('content')
    <div class="container bg-white" id="app" style="min-height:100vh">
        <div class="p-2">
            <h5 class="p-2 rounded">
                Training Resource
                <a href="{{ route('admin.training-resource.create') }}" class="btn btn-sm btn-danger float-right">
                    <i class="bi bi-plus-square pr-2"></i> Add
                </a>
            </h5>
            <div class="bg-light px-2 pb-5 pt-4 ">
                <table class="table table table-responsive" style="min-height:300px">
                    <thead>
                        <tr>
                            <th class="p-1">#</th>
                            <th class="p-1">Title</th>
                            <th class="p-1">Desc</th>
                            <th class="p-1"> Desc For Admin</th>
                            <th class="p-1"> Order</th>
                            <th class="p-1"> Status</th>
                            <th style="min-width:100px" class="p-1"class="">File Link</th>
                            <th style="min-width:100px" class="p-1"class="">Opreation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trs as $index => $tr)
                            <tr>
                                <td class="p-1">{{ ++$index }}</td>
                                <td class="p-1">{{ $tr->title }}</td>
                                <td class="p-1" style="cursor: pointer;" onclick="showMessage(this)" class="p-2"
                                    title="{{ $tr->description }}">
                                    <span class="full_text" style="display: none;">{{ $tr->description }}</span>
                                    <span class="short_text">
                                        @if (strlen($tr->description) > 10)
                                            {{ substr($tr->description, 0, 31) }}
                                            <strong>...</strong>
                                        @else
                                            {{ $tr->description }}
                                        @endif
                                    </span>
                                </td>
                                <td class="p-1" style="cursor: pointer;" onclick="showMessage(this)" class="p-2"
                                    title="{{ $tr->description_for_admin }}">
                                    <span class="full_text" style="display: none;">{{ $tr->description_for_admin }}</span>
                                    <span class="short_text">
                                        @if (strlen($tr->description_for_admin) > 10)
                                            {{ substr($tr->description_for_admin, 0, 31) }}
                                            <strong>...</strong>
                                        @else
                                            {{ $tr->description }}
                                        @endif
                                    </span>
                                </td>
                                <td class="p-1">
                                    <span class="badge bg-danger">{{ $tr->sort }}</span>
                                </td>
                                <td class="p-1">
                                    @if ($tr->status == 1)
                                        <small>
                                            <i style="color: #3ac508" class="bi bi-circle-fill mr-1"></i>
                                            Acitve
                                        </small>
                                    @else
                                        <small>
                                            Disabled
                                        </small>
                                    @endif
                                </td>
                                <td class="p-1">
                                    <a target="_blank" class="btn btn-sm btn-danger" href="{{ $tr->file }}"> View <i
                                            class="bi bi-download"></i></a>
                                </td>
                                <td class="p-1">
                                    <div class="dropdown show">
                                        <a class="btn btn-sm btn-light dropdown-toggle py-0" href="#" role="button"
                                            id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="width:200px">
                                            <ul class="list-group border-0">
                                                <li class="list-group-item  border-0  py-1 px-2 ">
                                                    <form
                                                        action="/admin/agent/training-resource/status/toggle/{{ $tr->id }}"
                                                        method="post">
                                                        @method('put')
                                                        @csrf
                                                        @if ($tr->status == 1)
                                                            <div class="d-flex justify-content-between">
                                                                <button type="submit" class="btn btn-sm px-0 ml-2">
                                                                    Make Disabled
                                                                </button>
                                                                <div>
                                                                    <i class="bi bi-x-circle-fill mr-2 "></i>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="d-flex justify-content-between">
                                                                <button type="submit" class="btn btn-sm px-0 ml-2">
                                                                    Make Active
                                                                </button>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i
                                                                    class="bi bi-activity mr-2"></i>
                                                            </div>
                                                        @endif
                                                    </form>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center border-0 py-1 px-2 ">
                                                    <form action="{{ route('admin.training-resource.destroy', $tr->id) }}"
                                                        method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <div>
                                                            <button type="submit" class="btn btn-sm px-0 ml-2">
                                                                Delete
                                                            </button>
                                                        </div>
                                                    </form>
                                                    <i class="bi bi-trash-fill mr-2"></i>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center border-0 py-1 px-2 ">
                                                    <a href="{{ route('admin.training-resource.edit', $tr->id) }}"
                                                        class="btn btn-sm">
                                                        Edit
                                                    </a>
                                                    <i class="bi bi-pencil-square mr-2"></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('child-scripts')
    <script>
        function showMessage(el) {
            $(el).children('.full_text').show();
            $(el).children('.short_text').hide();
        }
        const removeNewphoto = () => {
            $('.preview-container').hide();
            $('.old-photo').show();
        }
    </script>
@endpush
