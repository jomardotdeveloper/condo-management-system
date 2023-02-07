@extends("layouts.master")
@section("content")
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Editing {{ $stock->name }}</h4>
        </div>
    </div>
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
    <div class="card card-bordered card-preview mt-2">
        <div class="card-inner">
            <div class="preview-block">
                <form method="POST" action="{{ route('stocks.update', ['stock' => $stock]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row gy-4">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="name">Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ $stock->name }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="location">Location Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="location" name="location" placeholder="Enter location" value="{{ $stock->location }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="vendor_id">Vendor</label>
                                <div class="form-control-wrap ">
                                    <div class="form-control-select">
                                        <select class="form-control" name="vendor_id" id="vendor_id" required>
                                            @foreach ($vendors as $vendor)
                                                <option value="{{ $vendor->id }}" {{ $vendor->id == $stock->vendor_id ? "selected" : "" }}>
                                                    {{ $vendor->company_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="is_check_adjust" name="is_check_adjust" onchange="onchangeCheckAdjust(event)">
                                <label class="form-check-label" for="is_check_adjust">Adjust quantity? <strong>(On Hand Qty : {{ $stock->quantity }})</strong></label>
                            </div>
                            <div class="form-group" id="quantity_container" style="display: none;">
                                <label class="form-label" for="quantity">Quantity</label>
                                <div class="form-control-wrap">
                                    <input type="number" class="form-control" id="quantity" name="quantity" value="0" placeholder="Enter quantity" >
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-check form-switch">
                            </div>
                            <div class="form-group" id="remarks_container" style="display: none;">
                                <label class="form-label" for="remarks">Remarks</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="remarks" name="remarks" placeholder="Enter remarks" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-check form-switch">
                            </div>
                            <div class="form-control-select" id="move_container" style="display: none;">
                                <label class="form-label" for="move">Move</label>
                                <select class="form-control" name="move" id="move" required>
                                    <option value="IN">IN</option>
                                    <option value="OUT">OUT</option>
                                </select>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="col-sm-12 mt-2">
                        <input type="submit" value="Save Changes" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 


@endsection

@push('scripts')
    <script>
        function onchangeCheckAdjust(event) {
            if (event.target.checked) {
                document.getElementById('quantity_container').style.display = 'block';
                document.getElementById('remarks_container').style.display = 'block';
                document.getElementById('move_container').style.display = 'block';
                document.getElementById('quantity').setAttribute("required", "");
                document.getElementById('remarks').setAttribute("required", "");
                document.getElementById('move').setAttribute("required", "");
            } else {
                document.getElementById('quantity_container').style.display = 'none';
                document.getElementById('remarks_container').style.display = 'none';
                document.getElementById('move_container').style.display = 'none';
                document.getElementById('quantity').removeAttribute("required");
                document.getElementById('remarks').removeAttribute("required");
                document.getElementById('move').removeAttribute("required");
            }
        }
    </script>
    
@endpush