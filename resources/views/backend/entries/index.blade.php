@extends("layouts.master")
@section("content")
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Cash Flow</h4>
        </div>
    </div>
    @if(Session::has('success'))
    <div class="alert alert-success alert-icon">
        <em class="icon ni ni-check-circle"></em> <strong>Success</strong>. {{ Session::get('success') }}
    </div>
    @endif
    <h4>Net : {{ $net }}</h4>

    <a href="#" data-target="addEntry" class="toggle btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em></a>
    <div class="card card-bordered card-preview mt-2">
        <div class="card-inner">
            <table class="datatable-init nowrap table">
                <thead>
                    <tr>
                        <th>Account</th>
                        <th>Account Type</th>
                        <th>Bank</th>
                        <th>Reference</th>
                        <th>Amount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($entries as $entry)
                       
                        <tr>
                            <td>{{ $entry->account->name }}</td>
                            <td>{{ $entry->account->is_in ? "Cash In" : "Cash Out" }}</td>
                            <td>{{ $entry->bank ? $entry->bank->name : "" }}</td>
                            <td>{{ $entry->reference }} </td>
                            <td>{{ $entry->amount }} </td>
                            <td>
                                <a href="#" data-target="updateEntry{{ $entry->id }}" class="toggle btn btn-primary btn-sm d-none d-md-inline-flex"><em class="icon ni ni-pen"></em></a>
                                <a href="#" id="btnDeleteEntry{{ $entry->id }}" class="btn btn-danger btn-sm eg-swal-av3" ><em class="icon ni ni-trash"></em></a>
                            </td>
                        </tr>
                        <div class="nk-add-product toggle-slide toggle-slide-right" data-content="updateEntry{{ $entry->id }}" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h5 class="nk-block-title">Edit Record</h5>
                                </div>
                            </div>
                            <div class="nk-block">
                                <form action="{{ route('entries.update', ['entry' => $entry]) }}" method="POST" class="row g-3">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="account_id">Account</label>
                                            <div class="form-control-wrap">
                                                <select name="account_id" class="form-control" id="account_id" required>
                                                    @foreach ($accounts as $account)
                                                        <option value="{{ $account->id }}" {{ $account->id == $entry->account_id ? "selected" : "" }}>
                                                            {{ $account->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="bank_id">Bank</label>
                                            <div class="form-control-wrap">
                                                <select name="bank_id" class="form-control" id="bank_id" required>
                                                    @foreach ($banks as $bank)
                                                        <option value="{{ $bank->id }}" {{ $bank->id == $entry->bank_id ? "selected" : "" }}>
                                                            {{ $bank->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="reference">Reference</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="reference" name="reference" value="{{ $entry->reference }}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="amount">Amount</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="amount" name="amount" value="{{ $entry->amount }}"  required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <button class="btn btn-primary" type="submit"><em class="icon ni ni-pen"></em><span>Save Changes</span></button>
                                    </div>
                                </form>
                                <form action="{{ route('entries.destroy', ['entry' => $entry]) }}" method="POST" id="deleteEntry{{ $entry->id }}">
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


<div class="nk-add-product toggle-slide toggle-slide-right" data-content="addEntry" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h5 class="nk-block-title">New Record</h5>
        </div>
    </div>
    <div class="nk-block">
        <form action="{{ route('entries.store') }}" method="POST" class="row g-3">
            @csrf
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label" for="account_id">Account</label>
                    <div class="form-control-wrap">
                        <select name="account_id" class="form-control" id="account_id" required>
                            @foreach ($accounts as $account)
                                <option value="{{ $account->id }}">
                                    {{ $account->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label" for="bank_id">Bank</label>
                    <div class="form-control-wrap">
                        <select name="bank_id" class="form-control" id="bank_id" required>
                            @foreach ($banks as $bank)
                                <option value="{{ $bank->id }}">
                                    {{ $bank->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label" for="reference">Reference</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="reference" name="reference"  />
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label" for="amount">Amount</label>
                    <div class="form-control-wrap">
                        <input type="number" class="form-control" id="amount" name="amount"  required/>
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
            var id = e.target.parentNode.id.replace("btnDeleteEntry", "");
            document.getElementById("deleteEntry" + id).submit();
        }
    });
    e.preventDefault();
});
</script>
@endpush