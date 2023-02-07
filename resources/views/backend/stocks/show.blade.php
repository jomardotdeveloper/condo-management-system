@extends("layouts.master")
@section("content")
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">{{ $stock->name }}</h4>
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
                <span class="preview-title-lg overline-title">Main</span>
                <form method="POST" action="#" enctype="multipart/form-data">
                    @csrf
                    <div class="row gy-4">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="name">Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ $stock->name }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="location">Location Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="location" name="location" placeholder="Enter location" value="{{ $stock->location }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="quantity">Quantity</label>
                                <div class="form-control-wrap">
                                    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity" value="{{ $stock->quantity }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="vendor_id">Vendor</label>
                                <div class="form-control-wrap ">
                                    <div class="form-control-select">
                                        <select class="form-control" name="vendor_id" id="vendor_id" readonly>
                                            <option value="">{{$stock->vendor->company_name}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card card-bordered card-preview mt-2">
        <div class="card-inner">
            <span class="preview-title-lg overline-title">Stock Moves</span>
            <table class="datatable-init nowrap table">
                <thead>
                    <tr>
                        <th>Move</th>
                        <th>Quantity</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($stock->moves as $move)
                       <tr>
                        <td>{{ $move->is_in ? "IN" : "OUT" }}</td>
                        <td>{{ $move->quantity }}</td>
                        <td>{{ $move->remarks }}</td>
                       </tr>
                   @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> 


@endsection