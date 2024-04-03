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
    <a class="btn btn-sm text-white mx-2" style="background:#ce123c">
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
                        <label>Select File </label>
                        <input name="add_employee_user_file" type="file" class="form-control" accept=".xls, .xlsx"
                            required>
                    </div>
                </div>
                <a href="{{ route('admin.file.download', 'employee_template.xlsx') }}"
                    class="btn btn-sm btn-danger ml-3 mb-3">
                    Download Template &nbsp;
                    <i class="bi bi-cloud-arrow-down-fill"></i>
                </a>
                <div class="modal-footer p-2">
                    <button type="submit" class="btn btn-sm btn-danger">
                        Register
                        <i class="bi bi-arrow-right-circle-fill ml-1"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
