@extends("layouts.master")
@section("content")
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Tenants</h4>
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
    <a href="{{ route('tenants.create') }}"  class="btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em></a>
    <div class="card card-bordered card-preview mt-2">
        <div class="card-inner">
            <table class="datatable-init nowrap table">
                <thead>
                    <tr>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Unit No.</th>
                        <th>Unit Tower</th>
                        <th>Cluster</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($tenants as $tenant)
                       <tr>
                            <td>{{ $tenant->last_name }}</td>
                            <td>{{ $tenant->first_name }}</td>
                            <td>{{ $tenant->unit->unit_number }}</td>
                            <td>{{ $tenant->unit->unit_tower }}</td>
                            <td>{{ $tenant->unit->cluster->name }}</td>
                            <td>
                                <a href="{{ route('tenants.edit', ['tenant' => $tenant]) }}" class="btn btn-primary btn-sm d-none d-md-inline-flex"><em class="icon ni ni-pen"></em></a>
                                <a href="#" id="btnDeleteTenant{{ $tenant->id }}" class="btn btn-danger btn-sm eg-swal-av3" ><em class="icon ni ni-trash"></em></a>
                                <a href="{{ route('tenants.show', ['tenant' => $tenant]) }}" class="btn btn-info btn-sm d-none d-md-inline-flex"><em class="icon ni ni-eye"></em></a>
                                @if(!$tenant->has_portal)
                                <a href="javascript:void(0);" class="btn btn-warning btn-sm d-none d-md-inline-flex" data-bs-toggle="modal" data-bs-target="#modalForm{{ $tenant->id }}"><em class="icon ni ni-user"></em></a>
                                @endif
                            </td>
                       </tr>
                       <div class="modal fade" id="modalForm{{$tenant->id}}">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Grant Portal Access</h5>
                                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <em class="icon ni ni-cross"></em>
                                    </a>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('tenants.grant-portal', ['tenant' => $tenant]) }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label class="form-label" for="email-address">Email address</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="email-address" name="email" readonly value="{{ $tenant->email }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="password">Password</label>
                                            <div class="form-control-wrap">
                                                <input type="password" class="form-control" id="password" name="password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="password_confirmation">Confirm Password</label>
                                            <div class="form-control-wrap">
                                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer bg-light">
                                    <span class="sub-text">Grant Portal Access</span>
                                </div>
                            </div>
                        </div>
                    </div>
                       <div class="nk-add-product toggle-slide toggle-slide-right" data-content="updateTenant{{ $tenant->id }}" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
                            <div class="nk-block">
                                <form action="{{ route('tenants.destroy', ['tenant' => $tenant]) }}" method="POST" id="deleteTenant{{ $tenant->id }}">
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
            var id = e.target.parentNode.id.replace("btnDeleteTenant", "");
            console.log(document.getElementById("deleteTenant" + id));
            document.getElementById("deleteTenant" + id).submit();
        }
    });
    e.preventDefault();
});
</script>
@endpush