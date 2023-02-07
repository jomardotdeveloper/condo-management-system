@extends("layouts.master")
@section("content")
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Accounts</h4>
        </div>
    </div>
    @if(Session::has('success'))
    <div class="alert alert-success alert-icon">
        <em class="icon ni ni-check-circle"></em> <strong>Success</strong>. {{ Session::get('success') }}
    </div>
    @endif
    <a href="#" data-target="addAccount" class="toggle btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em></a>
    <div class="card card-bordered card-preview mt-2">
        <div class="card-inner">
            <table class="datatable-init nowrap table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($accounts as $account)
                       
                        <tr>
                            <td>{{ $account->name }}</td>
                            <td>{{ $account->is_in ? "Cash In" : "Cash Out" }}</td>
                            <td>{{ $account->total }} </td>
                            <td>
                                <a href="#" data-target="updateAccount{{ $account->id }}" class="toggle btn btn-primary btn-sm d-none d-md-inline-flex"><em class="icon ni ni-pen"></em></a>
                                <a href="#" id="btnDeleteAccount{{ $account->id }}" class="btn btn-danger btn-sm eg-swal-av3" ><em class="icon ni ni-trash"></em></a>
                            </td>
                        </tr>
                        <div class="nk-add-product toggle-slide toggle-slide-right" data-content="updateAccount{{ $account->id }}" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h5 class="nk-block-title">Edit Account</h5>
                                </div>
                            </div>
                            <div class="nk-block">
                                <form action="{{ route('accounts.update', ['account' => $account]) }}" method="POST" class="row g-3">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="name">Account Name</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="name" name="name" value="{{ $account->name }}"  required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="type">Type</label>
                                            <div class="form-control-wrap">
                                                <select name="type" class="form-control" id="type">
                                                    <option value="IN" {{ $account->is_in ? "selected" : "" }}>Cash In</option>
                                                    <option value="OUT" {{ !$account->is_in ? "selected" : "" }}>Cash Out</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <button class="btn btn-primary" type="submit"><em class="icon ni ni-pen"></em><span>Save Changes</span></button>
                                    </div>
                                </form>
                                <form action="{{ route('accounts.destroy', ['account' => $account]) }}" method="POST" id="deleteAccount{{ $account->id }}">
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


<div class="nk-add-product toggle-slide toggle-slide-right" data-content="addAccount" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h5 class="nk-block-title">New Account</h5>
        </div>
    </div>
    <div class="nk-block">
        <form action="{{ route('accounts.store') }}" method="POST" class="row g-3">
            @csrf
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label" for="name">Account Name</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="name" name="name"  required/>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label" for="type">Type</label>
                    <div class="form-control-wrap">
                        <select name="type" class="form-control" id="type">
                            <option value="IN">Cash In</option>
                            <option value="OUT">Cash Out</option>
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
            var id = e.target.parentNode.id.replace("btnDeleteAccount", "");
            document.getElementById("deleteAccount" + id).submit();
        }
    });
    e.preventDefault();
});
</script>
@endpush