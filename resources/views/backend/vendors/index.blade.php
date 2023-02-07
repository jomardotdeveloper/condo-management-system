@extends("layouts.master")
@section("content")
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Vendors</h4>
        </div>
    </div>
    @if(Session::has('success'))
    <div class="alert alert-success alert-icon">
        <em class="icon ni ni-check-circle"></em> <strong>Success</strong>. {{ Session::get('success') }}
    </div>
    @endif
    <a href="#" data-target="addVendor" class="toggle btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em></a>
    <div class="card card-bordered card-preview mt-2">
        <div class="card-inner">
            <table class="datatable-init nowrap table">
                <thead>
                    <tr>
                        <th>Company Name</th>
                        <th>Company Address</th>
                        <th>Contact #</th>
                        <th>Email</th>
                        <th>Contact Person</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vendors as $vendor)
                       
                        <tr>
                            <td>{{ $vendor->company_name }}</td>
                            <td>{{ $vendor->company_address }}</td>
                            <td>{{ $vendor->contact_no }}</td>
                            <td>{{ $vendor->email }}</td>
                            <td>{{ $vendor->contact_person }}</td>
                            <td>
                                <a href="#" data-target="updateVendor{{ $vendor->id }}" class="toggle btn btn-primary btn-sm d-none d-md-inline-flex"><em class="icon ni ni-pen"></em></a>
                                <a href="#" id="btnDeleteVendor{{ $vendor->id }}" class="btn btn-danger btn-sm eg-swal-av3" ><em class="icon ni ni-trash"></em></a>
                            </td>
                        </tr>
                        <div class="nk-add-product toggle-slide toggle-slide-right" data-content="updateVendor{{ $vendor->id }}" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h5 class="nk-block-title">Edit Vendor</h5>
                                </div>
                            </div>
                            <div class="nk-block">
                                <form action="{{ route('vendors.update', ['vendor' => $vendor]) }}" method="POST" class="row g-3">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="company_name">Company Name</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="company_name" name="company_name" value="{{ $vendor->company_name }}"  required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="company_address">Company Address</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="company_address" name="company_address" value="{{ $vendor->company_address }}" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="contact_no">Contact #</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="contact_no" name="contact_no" value="{{ $vendor->contact_no }}" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="email">Email</label>
                                            <div class="form-control-wrap">
                                                <input type="email" class="form-control" id="email" name="email" value="{{ $vendor->email }}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="contact_person">Contact Person</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="contact_person" name="contact_person" value="{{ $vendor->contact_person }}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <button class="btn btn-primary" type="submit"><em class="icon ni ni-pen"></em><span>Save Changes</span></button>
                                    </div>
                                </form>
                                <form action="{{ route('vendors.destroy', ['vendor' => $vendor]) }}" method="POST" id="deleteVendor{{ $vendor->id }}">
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


<div class="nk-add-product toggle-slide toggle-slide-right" data-content="addVendor" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h5 class="nk-block-title">New Vendor</h5>
        </div>
    </div>
    <div class="nk-block">
        <form action="{{ route('vendors.store') }}" method="POST" class="row g-3">
            @csrf
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label" for="company_name">Company Name</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="company_name" name="company_name"  required/>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label" for="company_address">Company Address</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="company_address" name="company_address"  required/>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label" for="contact_no">Contact #</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="contact_no" name="contact_no"  required/>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label" for="email">Email</label>
                    <div class="form-control-wrap">
                        <input type="email" class="form-control" id="email" name="email"  />
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label" for="contact_person">Contact Person</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="contact_person" name="contact_person" />
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
            var id = e.target.parentNode.id.replace("btnDeleteVendor", "");
            document.getElementById("deleteVendor" + id).submit();
        }
    });
    e.preventDefault();
});
</script>
@endpush