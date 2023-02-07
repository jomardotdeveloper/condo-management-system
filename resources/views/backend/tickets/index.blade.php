@extends("layouts.master")
@section("content")
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Tickets</h4>
        </div>
    </div>
    @if(Session::has('success'))
    <div class="alert alert-success alert-icon">
        <em class="icon ni ni-check-circle"></em> <strong>Success</strong>. {{ Session::get('success') }}
    </div>
    @endif
    <a href="#" data-target="addTicket" class="toggle btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em></a>
    <div class="card card-bordered card-preview mt-2">
        <div class="card-inner">
            <table class="datatable-init nowrap table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Client</th>
                        <th>Attachment</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tickets as $ticket)
                        <tr>
                            <td>{{ $ticket->title }}</td>
                            <td>{{ $ticket->description }}</td>
                            <td>{{ ucfirst($ticket->status) }}</td>
                            <td>{{ $ticket->user->email  }}</td>
                            <td>
                                @if ($ticket->attachment_src)
                                <a href="{{ $ticket->attachment_src }}" download class="btn btn-primary">Attachment</a>
                                @else
                                No attachment
                                @endif
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> 


<div class="nk-add-product toggle-slide toggle-slide-right" data-content="addTicket" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h5 class="nk-block-title">New Ticket</h5>
        </div>
    </div>
    <div class="nk-block">
        <form action="{{ route('tickets.store') }}" method="POST" class="row g-3" enctype="multipart/form-data">
            @csrf
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label" for="title">Title</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title"  required/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="description">Description</label>
                    <div class="form-control-wrap">
                        <textarea class="form-control" id="description" name="description" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="attachment_src">Attachment</label>
                    <div class="form-control-wrap">
                        <input type="file" class="form-control" id="attachment_src" name="attachment_src" />
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