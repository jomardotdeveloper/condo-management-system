@extends("layouts.master")
@section("content")
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Unit owners</h4>
        </div>
    </div>
    @if(Session::has('success'))
    <div class="alert alert-success alert-icon">
        <em class="icon ni ni-check-circle"></em> <strong>Success</strong>. {{ Session::get('success') }}
    </div>
    @endif
    <a href="{{ route('owners.create') }}"  class="btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em></a>
    <div class="card card-bordered card-preview mt-2">
        <div class="card-inner">
            <table class="datatable-init nowrap table">
                <thead>
                    <tr>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Unit No.</th>
                        <th>Residency Status</th>
                        <th>Unit Tower</th>
                        <th>Cluster</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($owners as $owner)
                       <tr>
                            <td>{{ $owner->last_name }}</td>
                            <td>{{ $owner->first_name }}</td>
                            <td>{{ $owner->unit->unit_number }}</td>
                            <td>{{ $owner->residency_status }}</td>
                            <td>{{ $owner->unit->unit_tower }}</td>
                            <td>{{ $owner->unit->cluster->name }}</td>
                            <td>
                                <a href="{{ route('owners.edit', ['owner' => $owner]) }}" class="btn btn-primary btn-sm d-none d-md-inline-flex"><em class="icon ni ni-pen"></em></a>
                                <a href="#" id="btnDeleteOwner{{ $owner->id }}" class="btn btn-danger btn-sm eg-swal-av3" ><em class="icon ni ni-trash"></em></a>
                                <a href="{{ route('owners.show', ['owner' => $owner]) }}" class="btn btn-info btn-sm d-none d-md-inline-flex"><em class="icon ni ni-eye"></em></a>
                            </td>
                       </tr>
                       <div class="nk-add-product toggle-slide toggle-slide-right" data-content="updateOwner{{ $owner->id }}" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
                            <div class="nk-block">
                                <form action="{{ route('owners.destroy', ['owner' => $owner]) }}" method="POST" id="deleteOwner{{ $owner->id }}">
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
            var id = e.target.parentNode.id.replace("btnDeleteOwner", "");
            console.log(document.getElementById("deleteOwner" + id));
            document.getElementById("deleteOwner" + id).submit();
        }
    });
    e.preventDefault();
});
</script>
@endpush