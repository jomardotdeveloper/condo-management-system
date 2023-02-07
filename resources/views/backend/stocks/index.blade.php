@extends("layouts.master")
@section("content")
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Stocks</h4>
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
    <a href="{{ route('stocks.create') }}"  class="btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em></a>
    <div class="card card-bordered card-preview mt-2">
        <div class="card-inner">
            <table class="datatable-init nowrap table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Vendor</th>
                        <th>Location</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($stocks as $stock)
                       <tr>
                            <td>{{ $stock->name }}</td>
                            <td>{{ $stock->vendor->company_name }}</td>
                            <td>{{ $stock->location }}</td>
                            <td>{{ $stock->quantity }}</td>
                            <td>
                                <a href="{{ route('stocks.edit', ['stock' => $stock]) }}" class="btn btn-primary btn-sm d-none d-md-inline-flex"><em class="icon ni ni-pen"></em></a>
                                <a href="#" id="btnDeleteStock{{ $stock->id }}" class="btn btn-danger btn-sm eg-swal-av3" ><em class="icon ni ni-trash"></em></a>
                                <a href="{{ route('stocks.show', ['stock' => $stock]) }}" class="btn btn-info btn-sm d-none d-md-inline-flex"><em class="icon ni ni-eye"></em></a>
                            </td>
                       </tr>
                       <div class="nk-add-product toggle-slide toggle-slide-right" data-content="updateStock{{ $stock->id }}" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
                            <div class="nk-block">
                                <form action="{{ route('stocks.destroy', ['stock' => $stock]) }}" method="POST" id="deleteStock{{ $stock->id }}">
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
            var id = e.target.parentNode.id.replace("btnDeleteStock", "");
            console.log(document.getElementById("deleteStock" + id));
            document.getElementById("deleteStock" + id).submit();
        }
    });
    e.preventDefault();
});
</script>
@endpush
