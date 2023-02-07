@extends("layouts.master")
@section("content")
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">New tenant</h4>
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
                <span class="preview-title-lg overline-title">Residence Information Sheet</span>
                <form method="POST" action="{{ route('tenants.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row gy-4">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-label" for="title">Title</label>
                                <div class="form-control-wrap ">
                                    <div class="form-control-select">
                                        <select class="form-control" name="title" id="title" required>
                                            @foreach (config('enum.owner_title') as $title)
                                                <option value="{{ $title }}">
                                                    {{ ucfirst($title) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-label" for="move_in_date">Move In</label>
                                <div class="form-control-wrap">
                                    <input type="date" class="form-control" id="move_in_date" name="move_in_date" placeholder="Enter your details" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-label" for="move_out_date">Move Out(Optional)</label>
                                <div class="form-control-wrap">
                                    <input type="date" class="form-control" id="move_out_date" name="move_out_date" placeholder="Enter your details" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row gy-4 mt-1">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-label" for="first_name">First Name</label>
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-right">
                                        <em class="icon ni ni-user"></em>
                                    </div>
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter your details" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-label" for="middle_name">Middle Name</label>
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-right">
                                        <em class="icon ni ni-user"></em>
                                    </div>
                                    <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Enter your details" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-label" for="last_name">Last Name</label>
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-right">
                                        <em class="icon ni ni-user"></em>
                                    </div>
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter your details" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-label" for="suffix_name">Suffix Name(Optional)</label>
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-right">
                                        <em class="icon ni ni-user"></em>
                                    </div>
                                    <input type="text" class="form-control" id="suffix_name" name="suffix_name" placeholder="Enter your details">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="gender">Gender</label>
                                <div class="form-control-wrap ">
                                    <div class="form-control-select">
                                        <select class="form-control" id="gender" name="gender" required>
                                            @foreach (config('enum.owner_gender') as $gender)
                                                <option value="{{ $gender }}">
                                                    {{ ucfirst($gender) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="birthdate">Birthday(Optional)</label>
                                <div class="form-control-wrap">
                                    <input type="date" class="form-control" id="birthdate" name="birthdate" placeholder="Enter your details">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="nationality">Nationality</label>
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-right">
                                        <em class="icon ni ni-user"></em>
                                    </div>
                                    <input type="text" class="form-control" id="nationality" name="nationality" placeholder="Enter your details" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="contact_no">Contact Number</label>
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-right">
                                        <em class="icon ni ni-user"></em>
                                    </div>
                                    <input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="Enter your details" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="email">Email Address</label>
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-right">
                                        <em class="icon ni ni-user"></em>
                                    </div>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your details" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="occupation">Occupation (Optional)</label>
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-right">
                                        <em class="icon ni ni-user"></em>
                                    </div>
                                    <input type="text" class="form-control" id="occupation" name="occupation" placeholder="Enter your details">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="preview-hr">
                    <div class="row gy-4">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="utility_bond">Utility Bond</label>
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-right">
                                        <em class="icon ni ni-user"></em>
                                    </div>
                                    <input type="text" class="form-control" id="utility_bond" name="utility_bond" placeholder="Enter your details">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="date_of_ar">Date of AR (Optional)</label>
                                <div class="form-control-wrap">
                                    <input type="date" class="form-control" id="date_of_ar" name="date_of_ar" placeholder="Enter your details">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="electric_reading">Electric Reading</label>
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-right">
                                        <em class="icon ni ni-user"></em>
                                    </div>
                                    <input type="text" class="form-control" id="electric_reading" name="electric_reading" placeholder="Enter your details" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="water_reading">Water Reading</label>
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-right">
                                        <em class="icon ni ni-user"></em>
                                    </div>
                                    <input type="text" class="form-control" id="water_reading" name="water_reading" placeholder="Enter your details" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="or_number">OR Number (Optional)</label>
                                <div class="form-control-wrap">
                                    <input type="date" class="form-control" id="or_number" name="or_number" placeholder="Enter your details">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="remarks">Remarks </label>
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-right">
                                        <em class="icon ni ni-user"></em>
                                    </div>
                                    <input type="text" class="form-control" id="remarks" name="remarks" placeholder="Enter your details">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="preview-hr">
                    <div class="row gy-4">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="lease_from">Lease From</label>
                                <div class="form-control-wrap">
                                    <input type="date" class="form-control" id="lease_from" name="lease_from" placeholder="Enter your details" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="lease_to">Lease To</label>
                                <div class="form-control-wrap">
                                    <input type="date" class="form-control" id="lease_to" name="lease_to" placeholder="Enter your details" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="occupant_type">Occupant Type</label>
                                <div class="form-control-wrap ">
                                    <div class="form-control-select">
                                        <select class="form-control" id="occupant_type" name="occupant_type" required>
                                            @foreach (config('enum.tenant_occupant_type') as $res)
                                            <option value="{{ $res }}">{{ $res }}</option>    
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="unit_id">Unit No.</label>
                                <div class="form-control-wrap ">
                                    <div class="form-control-select">
                                        <select class="form-control" id="unit_id" name="unit_id" required>
                                            @foreach ($units as $unit)
                                                <option value="{{ $unit->id }}">
                                                    {{ $unit->unit_number }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="residency_status">Residency Status</label>
                                <div class="form-control-wrap ">
                                    <div class="form-control-select">
                                        <select class="form-control" id="residency_status" name="residency_status" required>
                                            @foreach (config('enum.owner_residency_status') as $res)
                                            <option value="{{ $res }}">{{ $res }}</option>    
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="is_occupant">Is Occupant</label>
                                <div class="form-control-wrap ">
                                    <div class="form-control-select">
                                        <select class="form-control" id="is_occupant" name="is_occupant" required>
                                            <option value="YES">YES</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="preview-hr">
                <div class="row gy-4">
                    <div class="col-sm-7">
                        <div class="form-group">
                            <label class="form-label" for="address">Address</label>
                            <div class="form-control-wrap">
                                <textarea class="form-control" id="address" name="address" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label class="form-label" for="default-06">Image</label>
                            <div class="form-control-wrap">
                                <div class="form-file">
                                    <input type="file" multiple class="form-file-input" id="customFile" name="image_src" required>
                                    <label class="form-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="default-06">Proof of Identity</label>
                            <div class="form-control-wrap">
                                <div class="form-file">
                                    <input type="file" multiple class="form-file-input" id="customFile" name="proof_of_identity_src" required>
                                    <label class="form-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="default-06">Contract of Lease</label>
                            <div class="form-control-wrap">
                                <div class="form-file">
                                    <input type="file" multiple class="form-file-input" id="customFile" name="contract_of_lease_src" required>
                                    <label class="form-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="default-06">Upload Signature</label>
                            <div class="form-control-wrap">
                                <div class="form-file">
                                    <input type="file" multiple class="form-file-input" id="customFile" name="signature_src" required>
                                    <label class="form-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="preview-hr">
                <div class="row gy-4">
                    <div class="col-sm-4">
                        <span class="preview-title-lg overline-title">Preliminary Requirements:</span>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="pre_notarized" name="pre_notarized">
                            <label class="custom-control-label" for="pre_notarized">Notarized Contract of Lease for Tenant</label>
                        </div>
                        <div class="mt-2"></div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="pre_resident" name="pre_resident">
                            <label class="custom-control-label" for="pre_resident" >Resident's Information Sheet</label>
                        </div>
                        <div class="mt-2"></div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="pre_nbi" name="pre_nbi">
                            <label class="custom-control-label" for="pre_nbi" >NBI and Police Clearance of All Occupants</label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <span class="preview-title-lg overline-title">SPA & Gov't IDs</span>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="spa_spa" name="spa_spa">
                            <label class="custom-control-label" for="spa_spa">SPA from Owner far Authorized Representative-Applicant</label>
                        </div>
                        <div class="mt-2"></div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="spa_government" name="spa_government">
                            <label class="custom-control-label" for="spa_government">2 Government ID of the SPA</label>
                        </div>
                        <div class="mt-2"></div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="spa_acr" name="spa_acr">
                            <label class="custom-control-label" for="spa_acr">ACR, Passport, and VISA for Foreign Occupants</label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <span class="preview-title-lg overline-title">Other Requirements</span>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="other_health" name="other_health">
                            <label class="custom-control-label" for="other_health">Health Certificate of All Occupants</label>
                        </div>
                        <div class="mt-2"></div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="other_utility" name="other_tenant">
                            <label class="custom-control-label" for="other_utility">Tenant Bond</label>
                        </div>
                        <div class="mt-2"></div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="other_cleared" name="other_cleared">
                            <label class="custom-control-label" for="other_cleared">Cleared Accounts</label>
                        </div>
                        <div class="mt-2"></div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="other_paid" name="other_paid">
                            <label class="custom-control-label" for="other_paid">Paid Utility Bills (current)</label>
                        </div>
                        <div class="mt-2"></div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="other_clearance" name="other_clearance">
                            <label class="custom-control-label" for="other_clearance">Clearance From Security</label>
                        </div>
                        
                    </div>
                    <div class="col-sm-12">
                        <input type="submit" value="Submit" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 


@endsection