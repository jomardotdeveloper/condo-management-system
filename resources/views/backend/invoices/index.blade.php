@extends("layouts.master")
@section("content")
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Invoices</h4>
        </div>
    </div>
    @if(Session::has('success'))
    <div class="alert alert-success alert-icon">
        <em class="icon ni ni-check-circle"></em> <strong>Success</strong>. {{ Session::get('success') }}
    </div>
    @endif
    <a href="{{ route('invoices.create') }}" class="btn btn-primary"><em class="icon ni ni-plus"></em></a>
    
    <div class="card card-bordered card-preview mt-2">
        <div class="card-inner">
            <table class="datatable-init nowrap table">
                <thead>
                    <tr>
                        <th>Invoice number</th>
                        <th>Customer</th>
                        <th>Amount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoices as $invoice)
                        <tr>
                            <td>{{ $invoice->invoice_number }}</td>
                            <td>{{ $invoice->customer->full_name }}</td>
                            <td>{{ $invoice->amount }}</td>
                            <td>
                                @if(!$invoice->payment)
                                <a href="javascript:void(0);" class="btn btn-primary btn-sm d-none d-md-inline-flex" data-bs-toggle="modal" data-bs-target="#modalForm{{ $invoice->id }}"><em class="icon ni ni-money"></em></a>
                                @endif
                            </td>
                        </tr>
                        <div class="modal fade" id="modalForm{{$invoice->id}}">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Payment Registration</h5>
                                        <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <em class="icon ni ni-cross"></em>
                                        </a>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('payments.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="invoice_id" value="{{ $invoice->id }}"/>
                                            <div class="form-group">
                                                <label class="form-label" for="amount">Account</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-control" name="account_id" id="account_id" required>
                                                        @foreach ($accounts as $account)
                                                            <option value="{{ $account->id }}">{{ $account->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="amount">Amount</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="amount" name="amount" readonly value="{{ $invoice->amount }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="payment_method">Payment Method</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="payment_method" name="payment_method" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="payment_reference">Payment Reference</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="payment_reference" name="payment_reference" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="proof_of_payment_src">Proof of payment</label>
                                                <div class="form-control-wrap">
                                                    <input type="file" class="form-control" id="proof_of_payment_src" name="proof_of_payment_src" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer bg-light">
                                        <span class="sub-text">Payment Registration</span>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> 





@endsection
