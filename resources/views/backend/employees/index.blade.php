@extends("layouts.master")
@section("content")
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Employees</h4>
        </div>
    </div>
    @if(Session::has('success'))
    <div class="alert alert-success alert-icon">
        <em class="icon ni ni-check-circle"></em> <strong>Success</strong>. {{ Session::get('success') }}
    </div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger alert-icon">
            <em class="icon ni ni-cross-circle"></em>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <a href="#" data-target="addEmployee" class="toggle btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em></a>
    <div class="card card-bordered card-preview mt-2">
        <div class="card-inner">
            <table class="datatable-init nowrap table">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Department</th>
                        <th>Position</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                       
                        <tr>
                            <td>{{ $employee->full_name }}</td>
                            <td>{{ $employee->department->name }}</td>
                            <td>{{ $employee->position->name  }}</td>
                            <td>{{ $employee->user->email }}</td>
                            <td>
                                <a href="#" data-target="updateEmployee{{ $employee->id }}" class="toggle btn btn-primary btn-sm d-none d-md-inline-flex"><em class="icon ni ni-pen"></em></a>
                                <a href="#" id="btnDeleteEmployee{{ $employee->id }}" class="btn btn-danger btn-sm eg-swal-av3" ><em class="icon ni ni-trash"></em></a>
                            </td>
                        </tr>
                        <div class="nk-add-product toggle-slide toggle-slide-right" data-content="updateEmployee{{ $employee->id }}" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h5 class="nk-block-title">Edit Employee</h5>
                                </div>
                            </div>
                            <div class="nk-block">
                                <form action="{{ route('employees.update', ['employee' => $employee]) }}" method="POST" class="row g-3">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="name">First Name</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $employee->first_name }}"  required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="name">Middle Name</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ $employee->middle_name }}"  />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="name">Last Name</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $employee->last_name }}"  required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="name">Department</label>
                                            <div class="form-control-wrap">
                                                <select name="department_id" class="form-control" id="department_id">
                                                    @foreach ($departments as $department)
                                                        <option value="{{ $department->id }}" {{ $department->id == $employee->department_id ? "selected" : "" }}>{{ $department->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="name">Position</label>
                                            <div class="form-control-wrap">
                                                <select name="position_id" class="form-control" id="position_id">
                                                    @foreach ($positions as $position)
                                                        <option value="{{ $position->id }}" {{ $position->id == $employee->position_id ? "selected" : "" }}>{{ $position->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="name">Email</label>
                                            <div class="form-control-wrap">
                                                <input type="email" class="form-control" id="email" name="email" value="{{ $employee->user->email }}"  required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="is_check_password" name="is_check_password" onchange="onchangeCheckPassword(event)">
                                        <label class="form-check-label" for="is_check_password">Do you want to reset your password?</label>
                                    </div>
                                    <div class="col-12 password_container" style="display: none;">
                                        <div class="form-group">
                                            <label class="form-label" for="name">Password</label>
                                            <div class="form-control-wrap">
                                                <input type="password" class="form-control" id="password" name="password"  />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 password_container" style="display: none;">
                                        <div class="form-group">
                                            <label class="form-label" for="name">Confirm Password</label>
                                            <div class="form-control-wrap">
                                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"  />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <button class="btn btn-primary" type="submit"><em class="icon ni ni-pen"></em><span>Save Changes</span></button>
                                    </div>
                                </form>
                                <form action="{{ route('employees.destroy', ['employee' => $employee]) }}" method="POST" id="deleteEmployee{{ $employee->id }}">
                                    @csrf
                                    @method("DELETE")
                                </form>
                            </div>
                        </div>
                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> 


<div class="nk-add-product toggle-slide toggle-slide-right" data-content="addEmployee" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h5 class="nk-block-title">New Employee</h5>
        </div>
    </div>
    <div class="nk-block">
        <form action="{{ route('employees.store') }}" method="POST" class="row g-3">
            @csrf
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label" for="name">First Name</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="first_name" name="first_name"  required/>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label" for="name">Middle Name</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="middle_name" name="middle_name"  />
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label" for="name">Last Name</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="last_name" name="last_name"  required/>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label" for="name">Department</label>
                    <div class="form-control-wrap">
                        <select name="department_id" class="form-control" id="department_id">
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label" for="name">Position</label>
                    <div class="form-control-wrap">
                        <select name="position_id" class="form-control" id="position_id">
                            @foreach ($positions as $position)
                                <option value="{{ $position->id }}">{{ $position->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label" for="name">Email</label>
                    <div class="form-control-wrap">
                        <input type="email" class="form-control" id="email" name="email"  required/>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label" for="name">Password</label>
                    <div class="form-control-wrap">
                        <input type="password" class="form-control" id="password" name="password"  required/>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label" for="name">Confirm Password</label>
                    <div class="form-control-wrap">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"  required/>
                    </div>
                </div>
            </div>
           
            <div class="col-12">
                <button class="btn btn-primary" type="submit"><em class="icon ni ni-plus"></em><span>Add New</span></button>
            </div>
        </form>
    </div>
</div>


@endsection

@push('scripts')
<script>
$('.eg-swal-av3').on("click", function(e){
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.value) {
            var id = e.target.parentNode.id.replace("btnDeleteEmployee", "");
            document.getElementById("deleteEmployee" + id).submit();
        }
    });
    e.preventDefault();
});

function onchangeCheckPassword(event){
    var passwordContainers = document.querySelectorAll('.password_container');
    if (event.target.checked) {
        passwordContainers[0].style = "display: block";
        passwordContainers[0].querySelector("#password").setAttribute("required", "");
        passwordContainers[1].style = "display: block";
        passwordContainers[1].querySelector("#password_confirmation").setAttribute("required", "");
    } else {
        passwordContainers[0].style = "display: none";
        passwordContainers[0].querySelector("#password").removeAttribute("required");
        passwordContainers[1].style = "display: none";
        passwordContainers[1].querySelector("#password_confirmation").removeAttribute("required");
    }
}

</script>
@endpush