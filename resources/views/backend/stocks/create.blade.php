@extends("layouts.master")
@section("content")
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">New stock</h4>
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
                <form method="POST" action="{{ route('stocks.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row gy-4">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="name">Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="location">Location Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="location" name="location" placeholder="Enter location" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="quantity">Quantity</label>
                                <div class="form-control-wrap">
                                    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity" required>
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
                                                <option value="{{ $vendor->id }}">
                                                    {{ $vendor->company_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="col-sm-12 mt-2">
                        <input type="submit" value="Submit" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 


@endsection