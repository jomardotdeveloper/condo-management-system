@extends("layouts.master")
@section("content")
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Leave Approvers</h4>
        </div>
    </div>
    @if(Session::has('success'))
    <div class="alert alert-success alert-icon">
        <em class="icon ni ni-check-circle"></em> <strong>Success</strong>. {{ Session::get('success') }}
    </div>
    @endif
    <a href="#" data-target="addApprover" class="toggle btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em></a>
    <div class="card card-bordered card-preview mt-2">
        <div class="card-inner">
            <table class="datatable-init nowrap table">
                <thead>
                    <tr>
                        <th>Employee</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($approvers as $approver)
                       
                        <tr>
                            <td>{{ $approver->user->employee->full_name }}</td>
                            <td>
                                <a href="#" id="btnDeleteApprover{{ $approver->id }}" class="btn btn-danger btn-sm eg-swal-av3" ><em class="icon ni ni-trash"></em></a>
                            </td>
                        </tr>
                        <div class="nk-add-product toggle-slide toggle-slide-right" data-content="updateApprover{{ $approver->id }}" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
                            <div class="nk-block">
                                <form action="{{ route('leave-approvers.destroy', ['leave_approver' => $approver]) }}" method="POST" id="deleteApprover{{ $approver->id }}">
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


<div class="nk-add-product toggle-slide toggle-slide-right" data-content="addApprover" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h5 class="nk-block-title">New Leave Approver</h5>
        </div>
    </div>
    <div class="nk-block">
        <form action="{{ route('leave-approvers.store') }}" method="POST" class="row g-3">
            @csrf
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label" for="user_id">Employee</label>
                    <div class="form-control-wrap">
                        <select name="user_id" class="form-control" id="user_id">
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->employee->full_name }}</option>
                            @endforeach
                        </select>
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
            var id = e.target.parentNode.id.replace("btnDeleteApprover", "");
            console.log(e.target);
            document.getElementById("deleteApprover" + id).submit();
        }
    });
    e.preventDefault();
});
</script>
@endpush