@extends("layouts.master")
@section("content")
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Units</h4>
        </div>
    </div>
    @if(Session::has('success'))
    <div class="alert alert-success alert-icon">
        <em class="icon ni ni-check-circle"></em> <strong>Success</strong>. {{ Session::get('success') }}
    </div>
    @endif
    <a href="#" data-target="addUnit" class="toggle btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em></a>
    <div class="card card-bordered card-preview mt-2">
        <div class="card-inner">
            <table class="datatable-init nowrap table">
                <thead>
                    <tr>
                        <th>Unit No.</th>
                        <th>Unit Cluster</th>
                        <th>Unit Tower</th>
                        <th>Unit Floor</th>
                        <th>Unit Room</th>
                        <th>Unit Type</th>
                        <th>Floor Area</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($units as $unit)
                       <tr>
                            <td>
                               {{ $unit->unit_number }} 
                            </td>
                            <td>
                                {{ $unit->cluster->name }} 
                            </td>
                            <td>
                                {{ $unit->unit_tower }} 
                            </td>
                            <td>
                                {{ $unit->unit_floor }} 
                            </td>
                            <td>
                                {{ $unit->unit_room }} 
                            </td>
                            <td>
                                {{ ucfirst($unit->unit_type) }} 
                            </td>
                            <td>
                                {{ $unit->floor_area }} 
                            </td>
                            <td>
                                {{ $unit->status }} 
                            </td>
                            <td>
                                <a href="#" data-target="updateUnit{{ $unit->id }}" class="toggle btn btn-primary btn-sm d-none d-md-inline-flex"><em class="icon ni ni-pen"></em></a>
                                <a href="#" id="btnDeleteUnit{{ $unit->id }}" class="btn btn-danger btn-sm eg-swal-av3" ><em class="icon ni ni-trash"></em></a>
                            </td>
                       </tr>
                       <div class="nk-add-product toggle-slide toggle-slide-right" data-content="updateUnit{{ $unit->id }}" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h5 class="nk-block-title">Edit Unit</h5>
                            </div>
                        </div>
                        <div class="nk-block">
                            <form action="{{ route('units.update', ['unit' => $unit]) }}" method="POST" class="row g-3">
                                @csrf
                                @method('PUT')
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="unit_number">Unit Number</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="unit_number" name="unit_number" value="{{ $unit->unit_number }}"  required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="cluster_id">Unit Cluster</label>
                                        <div class="form-control-wrap">
                                            <select name="cluster_id" id="cluster_id" class="form-control" onchange="clusterOnChange()" required>
                                                @foreach ($clusters as $cluster)
                                                    <option value="{{ $cluster->id }}" data-unit-towers="{{ $cluster->unit_towers }}" {{ $cluster->id == $unit->cluster_id ? "selected" : "" }}>{{ $cluster->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                @if ($unit->unit_tower)
                                <div class="col-12" id="unit_tower_container">
                                    <div class="form-group">
                                        <label class="form-label" for="unit_tower">Unit Tower</label>
                                        <div class="form-control-wrap">
                                            <select name="unit_tower" id="unit_tower" class="form-control" required>
                                                @foreach (explode(",", $unit->cluster->unit_towers) as $tower)
                                                    <option value="{{ $tower }}" {{ trim($tower) == trim($unit->unit_tower) ? "selected" : "" }}>
                                                        {{$tower}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="unit_floor">Unit Floor</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="unit_floor" name="unit_floor" value="{{ $unit->unit_floor }}"  required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="unit_room">Unit Room</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="unit_room" name="unit_room"  value="{{ $unit->unit_room }}" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="unit_type">Unit Type</label>
                                        <div class="form-control-wrap">
                                            <select name="unit_type" id="unit_type" class="form-control" required>
                                                @foreach (config('enum.unit_type') as $type)
                                                    <option value="{{ $type }}" {{ $type == $unit->unit_type ? "selected" : "" }}>
                                                        {{ ucfirst($type) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="floor_area">Unit Room</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="floor_area" name="floor_area"  value="{{ $unit->floor_area }}" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="unit_association_fee">Unit Association Fee</label>
                                        <div class="form-control-wrap">
                                            <input type="number" class="form-control" id="unit_association_fee" name="unit_association_fee"  value="{{ $unit->unit_association_fee }}"  required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="unit_parking_fee">Unit Parking Fee</label>
                                        <div class="form-control-wrap">
                                            <input type="number" class="form-control" id="unit_parking_fee" name="unit_parking_fee" value="{{ $unit->unit_parking_fee }}"  required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="status">Status</label>
                                        <div class="form-control-wrap">
                                            <select name="status" id="status" class="form-control" required>
                                                @foreach (config('enum.unit_status') as $status)
                                                    <option value="{{ $status }}" {{ $status == $unit->status ? "selected" : "" }}>
                                                        {{ $status }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <button class="btn btn-primary" type="submit"><em class="icon ni ni-pen"></em><span>Save Changes</span></button>
                                </div>
                            </form>
                            <form action="{{ route('units.destroy', ['unit' => $unit]) }}" method="POST" id="deleteUnit{{ $unit->id }}">
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


<div class="nk-add-product toggle-slide toggle-slide-right" data-content="addUnit" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h5 class="nk-block-title">New Unit</h5>
        </div>
    </div>
    <div class="nk-block">
        <form action="{{ route('units.store') }}" method="POST" class="row g-3">
            @csrf
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label" for="unit_number">Unit Number</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="unit_number" name="unit_number"  required/>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label" for="cluster_id">Unit Cluster</label>
                    <div class="form-control-wrap">
                        <select name="cluster_id" id="cluster_id" class="form-control" onchange="clusterOnChange()" required>
                            @foreach ($clusters as $cluster)
                                <option value="{{ $cluster->id }}" data-unit-towers="{{ $cluster->unit_towers }}">{{ $cluster->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            @if (count($clusters) > 0)
            <div class="col-12" id="unit_tower_container">
                <div class="form-group">
                    <label class="form-label" for="unit_tower">Unit Tower</label>
                    <div class="form-control-wrap">
                        <select name="unit_tower" id="unit_tower" class="form-control" required>
                            @foreach (explode(",", $clusters[0]->unit_towers) as $tower)
                                <option value="{{ $tower }}">
                                    {{$tower}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label" for="unit_floor">Unit Floor</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="unit_floor" name="unit_floor"  required/>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label" for="unit_room">Unit Room</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="unit_room" name="unit_room"  required/>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label" for="unit_type">Unit Type</label>
                    <div class="form-control-wrap">
                        <select name="unit_type" id="unit_type" class="form-control" required>
                            @foreach (config('enum.unit_type') as $type)
                                <option value="{{ $type }}">
                                    {{ ucfirst($type) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label" for="floor_area">Unit Room</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="floor_area" name="floor_area"  required/>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label" for="unit_association_fee">Unit Association Fee</label>
                    <div class="form-control-wrap">
                        <input type="number" class="form-control" id="unit_association_fee" name="unit_association_fee"  required/>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label" for="unit_parking_fee">Unit Parking Fee</label>
                    <div class="form-control-wrap">
                        <input type="number" class="form-control" id="unit_parking_fee" name="unit_parking_fee"  required/>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label" for="status">Status</label>
                    <div class="form-control-wrap">
                        <select name="status" id="status" class="form-control" required>
                            @foreach (config('enum.unit_status') as $status)
                                <option value="{{ $status }}">
                                    {{ $status }}
                                </option>
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
            var id = e.target.parentNode.id.replace("btnDeleteUnit", "");
            document.getElementById("deleteUnit" + id).submit();
        }
    });
    e.preventDefault();
});

function clusterOnChange() {
    var clusterId = document.getElementById("cluster_id").value;
    var towers = document.getElementById("cluster_id").options[document.getElementById("cluster_id").selectedIndex].dataset.unitTowers;
    var towersArray = towers.split(",");
    var unitTower = document.getElementById("unit_tower");
    var unitTowerContainer = document.getElementById("unit_tower_container");

    if (towersArray.length >= 1) {
        unitTowerContainer.style.display = "block";
    } else {
        unitTowerContainer.style.display = "none";
    }

    unitTower.innerHTML = "";

    for (var i = 0; i < towersArray.length; i++) {
        var option = document.createElement("option");
        option.value = towersArray[i];
        option.text = towersArray[i];
        unitTower.add(option);
    }
}
</script>
@endpush