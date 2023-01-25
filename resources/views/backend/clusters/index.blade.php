@extends("layouts.master")
@section("content")
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Clusters</h4>
        </div>
    </div>
    @if(Session::has('success'))
    <div class="alert alert-success alert-icon">
        <em class="icon ni ni-check-circle"></em> <strong>Success</strong>. {{ Session::get('success') }}
    </div>
    @endif
    <a href="#" data-target="addCluster" class="toggle btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em></a>
    <div class="card card-bordered card-preview mt-2">
        <div class="card-inner">
            <table class="datatable-init nowrap table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Bills day reading</th>
                        <th>Due date interval</th>
                        <th>Tower</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clusters as $cluster)
                        
                        <tr>
                            <td>{{ $cluster->name }}</td>
                            <td>{{ $cluster->reading_day }}</td>
                            <td>{{ $cluster->due_date }}</td>
                            <td>{{ $cluster->unit_towers  }}</td>
                            <td>
                                <a href="#" data-target="updateCluster{{ $cluster->id }}" class="toggle btn btn-primary btn-sm d-none d-md-inline-flex"><em class="icon ni ni-pen"></em></a>
                                <a href="#" id="btnDeleteCluster{{ $cluster->id }}" class="btn btn-danger btn-sm eg-swal-av3" ><em class="icon ni ni-trash"></em></a>
                            </td>
                        </tr>
                        <div class="nk-add-product toggle-slide toggle-slide-right" data-content="updateCluster{{ $cluster->id }}" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h5 class="nk-block-title">Edit Cluster</h5>
                                </div>
                            </div>
                            <div class="nk-block">
                                <form action="{{ route('clusters.update', ['cluster' => $cluster]) }}" method="POST" class="row g-3">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="name">Cluster Name</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="name" name="name" value="{{ $cluster->name }}" placeholder="Cluster Name"  required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="name">Cluster Unit Tower</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="unit_towers" name="unit_towers" value="{{ $cluster->unit_towers }}" placeholder="Comma Separated" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="name">Bills reading day</label>
                                            <div class="form-control-wrap">
                                                <input type="number" class="form-control" id="reading_day" min="1" max="31" name="reading_day" value="{{ $cluster->reading_day }}" placeholder="Day of the month"  required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="name">Utilities due date</label>
                                            <div class="form-control-wrap">
                                                <input type="number" class="form-control" min="1" id="due_date" name="due_date" placeholder="Days" value="{{ $cluster->due_date }}"  required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <button class="btn btn-primary" type="submit"><em class="icon ni ni-pen"></em><span>Save Changes</span></button>
                                    </div>
                                </form>
                                <form action="{{ route('clusters.destroy', ['cluster' => $cluster]) }}" method="POST" id="deleteCluster{{ $cluster->id }}">
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


<div class="nk-add-product toggle-slide toggle-slide-right" data-content="addCluster" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h5 class="nk-block-title">New Cluster</h5>
        </div>
    </div>
    <div class="nk-block">
        <form action="{{ route('clusters.store') }}" method="POST" class="row g-3">
            @csrf
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label" for="name">Cluster Name</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Cluster Name"  required/>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label" for="name">Cluster Unit Tower</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="unit_towers" name="unit_towers" placeholder="Comma Separated" />
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label" for="name">Bills reading day</label>
                    <div class="form-control-wrap">
                        <input type="number" class="form-control" id="reading_day" min="1" max="31" name="reading_day" placeholder="Day of the month"  required/>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label" for="name">Utilities due date</label>
                    <div class="form-control-wrap">
                        <input type="number" class="form-control" min="1" id="due_date" name="due_date" placeholder="Days"  required/>
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
            var id = e.target.parentNode.id.replace("btnDeleteCluster", "");
            document.getElementById("deleteCluster" + id).submit();
        }
    });
    e.preventDefault();
});
</script>
@endpush