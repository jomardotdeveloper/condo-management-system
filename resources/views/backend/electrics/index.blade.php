@extends("layouts.master")
@section("content")
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Electric Readings</h4>
        </div>
    </div>
    @if(Session::has('success'))
    <div class="alert alert-success alert-icon">
        <em class="icon ni ni-check-circle"></em> <strong>Success</strong>. {{ Session::get('success') }}
    </div>
    @endif
    <a href="javascript:void(0);"  class="toggle btn btn-primary d-none d-md-inline-flex" onclick="btnImport()"><em class="icon ni ni-upload"></em>Import</a>
    <a href="#" data-target="addElectric" class="toggle btn btn-success d-none d-md-inline-flex"><em class="icon ni ni-download"></em>Download Template</a>
    <div class="card card-bordered card-preview mt-2">
        <div class="card-inner">
            <table class="datatable-init nowrap table">
                <thead>
                    <tr>
                        <th>Unit</th>
                        <th>Cluster</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Reading</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($readings as $reading)
                        <tr>
                            <td>{{ $reading->unit->name }}</td>
                            <td>{{ $reading->cluster->name }}</td>
                            <td>{{ $reading->from }}</td>
                            <td>{{ $reading->to }}</td>
                            <td>{{ $reading->reading }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> 


<form action="{{ route('electrics.store') }}" method="POST" id="importForm" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" class="custom-file-input d-none" id="file">
</form>

@endsection
@push('scripts')
    <script>
        var file = document.getElementById("file");
        function btnImport(){
            file.click();
        }
        file.onchange = function (){
            document.getElementById("importForm").submit();
        };
    </script>
@endpush