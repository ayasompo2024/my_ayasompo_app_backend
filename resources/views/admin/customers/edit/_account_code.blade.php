<div>
    <h6 class="bg-light p-2 rounded">
        Account Codes
        <button class="btn btn-sm bg-info ml-3" data-toggle="modal" data-target="#exampleModal">Add New</button>
    </h6>
    <div class="px-2">
        <table class="table">
            <thead>
                <tr>
                    <th class="p-1">#</th>
                    <th style="width:150px" class="p-1">Code</th>
                    <th style="width:350px" class="p-1">Update</th>
                    <th style="width:350px" class="d-flex justify-content-end p-1">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customer->accountCodes as $index => $item)
                    <tr>
                        <td class="p-1">{{ ++$index }}</td>
                        <td class="p-1">{{ $item->code }}</td>
                        <td class="p-1">
                            <form method="post" action="{{ route('admin.customer.update.agent.code', $item->id) }}">
                                @csrf
                                @method('put')
                                <div class="d-flex">
                                    <input name="code" value="{{ $item->code }}" type="text"
                                        class="form-control form-control-sm">
                                    <button class="btn btn-info ml-2 btn-sm">Update</button>
                                </div>
                            </form>
                        </td>
                        <td class="p-1 d-flex justify-content-end">
                            <form method="post" action="{{ route('admin.customer.delete.agent.code', $item->id) }}">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger ml-2 btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('admin.customer.new.agent.code') }}">
            @method('post')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Code</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span>Code </span>
                    <input type="text" name="code"  required class="form-control form-control-sm" placeholder="Enter Code">
                    <input type="hidden" name="customer_id"  value="{{$customer->id}}" required >
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-danger">Save changes</button>
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
