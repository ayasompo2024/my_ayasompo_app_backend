@if (Auth::user()->role == 'Corporate' || Auth::user()->role == 'Root')
    <a class="btn btn-sm text-white" data-toggle="modal" data-target="#new" style="background:#ce123c">
        <i class="bi bi-plus-square pr-2"></i> Group User Add
    </a>
@endif
@if (Auth::user()->role == 'HR' || Auth::user()->role == 'Root')
    <a class="btn btn-sm mx-2 text-white" data-toggle="modal" data-target="#AddEmployeeUser" style="background:#ce123c">
        <i class="bi bi-plus-square pr-2"></i> Add Employee User
    </a>
@endif
@if (Auth::user()->role == 'Agent' || Auth::user()->role == 'Root')
    <a class="btn btn-sm text-white mx-2" data-toggle="modal" data-target="#AddAgentUser" style="background:#ce123c">
        <i class="bi bi-plus-square pr-2"></i> Add Agent User
    </a>
@endif
<div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.customer.get-customers-list-by-policy') }}" method="post">
                @csrf
                <div class="modal-header p-2">
                    <h5 class="modal-title" id="exampleModalLongTitle">New Customer</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body px-3 py-2">
                    <div class="form-group">
                        <label for="policy_no">Enter Policy Number</label>
                        <input name="policy_no" type="text" class="form-control form-control-sm" required
                            id="policy_no" placeholder="AYA/YGN/MCP/791289241">
                    </div>
                </div>
                <div class="modal-footer p-2">
                    <button type="submit" class="btn btn-sm btn-danger">
                        Next
                        <i class="bi bi-arrow-right-circle-fill ml-1"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="AddEmployeeUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.customer.new.employee') }}" method="post" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-header p-2">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Employee User</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body px-3 py-2">
                    <div class="form-group">
                        
                        <input name="add_employee_user_file" type="file" class="border w-100" accept=".xls, .xlsx"
                            required>
                    </div>
                </div>
                <div class="modal-footer p-2">
                <a href="{{ route('admin.file.download', 'employee_template.xlsx') }}"
                    class="btn btn-sm btn-danger float-left">
                    Download Template &nbsp;
                    <i class="bi bi-cloud-arrow-down-fill"></i>
                </a>
                    <button type="submit" class="btn btn-sm btn-danger">
                        Register
                        <i class="bi bi-arrow-right-circle-fill ml-1"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="AddAgentUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.customer.new.agent') }}" method="post" method="post"
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
                        <input name="add_agent_user_file" type="file"
                            class="btn btn-sm border p-1 w-100 inputfile" accept=".xls, .xlsx" required>
                    </div>
                </div>
                <div class="modal-footer p-2">
                    <a href="{{ route('admin.file.download', 'agent_template.xlsx') }}"
                        class="btn btn-sm btn-danger float-left">
                        Download Template &nbsp;
                        <i class="bi bi-cloud-arrow-down-fill"></i>
                    </a>
                    <button type="submit" class="btn btn-sm btn-danger">
                        Register
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
