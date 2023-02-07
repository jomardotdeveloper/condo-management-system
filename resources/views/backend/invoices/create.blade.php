@extends("layouts.master")
@section("content")
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">New invoice</h4>
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
                <form method="POST" action="{{ route('invoices.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row gy-4">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="customer">Customer</label>
                                <div class="form-control-wrap ">
                                    <div class="form-control-select">
                                        <select class="form-control" name="customer" id="customer" required>
                                            @foreach ($owners as $owner)
                                                <option value="o_{{ $owner->id }}">
                                                    {{ $owner->full_name }}
                                                </option>
                                            @endforeach
                                            @foreach ($tenants as $tenant)
                                                <option value="t_{{ $tenant->id }}">
                                                    {{ $tenant->full_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="date_deadline">Due Date</label>
                                <div class="form-control-wrap">
                                    <input type="date" class="form-control" id="date_deadline" name="date_deadline" placeholder="Enter your details" required>
                                </div>
                            </div>
                        </div>
                        <table class="table">
                            <thead class="thead-primary text-center">
                                <tr>
                                    <th scope="col">Label</th>
                                    <th scope="col">Amount</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td>Monthly Due</td>
                                    <td>{{ $monthly_due }}</td>
                                </tr>
                                <tr>
                                    <td>Electricity</td>
                                    <td>{{ $electricity }}</td>
                                </tr>
                                <tr>
                                    <td>Water</td>
                                    <td>{{ $water }}</td>
                                </tr>
                                <tr>
                                    <td>Penalty</td>
                                    <td>{{ 0 }}</td>
                                </tr>
                            </tbody>
                        </table>
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