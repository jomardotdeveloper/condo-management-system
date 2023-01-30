@extends("layouts.master")
@section("content")
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Editing {{ $owner->full_name }}</h4>
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
                <form method="POST" action="{{ route('owners.update', ['owner' => $owner]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row gy-4">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-label" for="title">Title</label>
                                <div class="form-control-wrap ">
                                    <div class="form-control-select">
                                        <select class="form-control" name="title" id="title" required>
                                            @foreach (config('enum.owner_title') as $title)
                                                <option value="{{ $title }}" {{ $title == $owner->title ? "selected" : ""}}>
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
                                    <input type="date" class="form-control" id="move_in_date" name="move_in_date" placeholder="Enter your details" value="{{ $owner->move_in_date }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-label" for="move_out_date">Move Out(Optional)</label>
                                <div class="form-control-wrap">
                                    <input type="date" class="form-control" id="move_out_date" name="move_out_date" placeholder="Enter your details" value="{{ $owner->move_out_date }}">
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
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter your details" value="{{ $owner->first_name }}" required>
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
                                    <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Enter your details" value="{{ $owner->middle_name }}"  required>
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
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter your details" value="{{ $owner->last_name }}" required>
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
                                    <input type="text" class="form-control" id="suffix_name" name="suffix_name" placeholder="Enter your details" value="{{ $owner->suffix_name }}">
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
                                                <option value="{{ $gender }}" {{ $gender == $owner->gender ? "selected" : "" }}>
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
                                    <input type="date" class="form-control" id="birthdate" name="birthdate"  value="{{ $owner->birthdate }}" placeholder="Enter your details">
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
                                    <input type="text" class="form-control" id="nationality" name="nationality" value="{{ $owner->nationality }}" placeholder="Enter your details" required>
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
                                    <input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="Enter your details" value="{{ $owner->contact_no }}" required>
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
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $owner->email }}" placeholder="Enter your details" required>
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
                                    <input type="text" class="form-control" id="occupation" name="occupation" value="{{ $owner->occupation }}" placeholder="Enter your details">
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
                                    <input type="text" class="form-control" id="utility_bond" name="utility_bond" value="{{ $owner->utility_bond }}" placeholder="Enter your details">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="date_of_ar">Date of AR (Optional)</label>
                                <div class="form-control-wrap">
                                    <input type="date" class="form-control" id="date_of_ar" name="date_of_ar" value="{{ $owner->date_of_ar }}" placeholder="Enter your details">
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
                                    <input type="text" class="form-control" id="electric_reading" name="electric_reading" value="{{ $owner->electric_reading }}"  placeholder="Enter your details" required>
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
                                    <input type="text" class="form-control" id="water_reading" name="water_reading" value="{{ $owner->water_reading }}" placeholder="Enter your details" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="or_number">OR Number (Optional)</label>
                                <div class="form-control-wrap">
                                    <input type="date" class="form-control" id="or_number" name="or_number" value="{{ $owner->or_number }}" placeholder="Enter your details">
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
                                    <input type="text" class="form-control" id="remarks" name="remarks" value="{{ $owner->remarks }}" placeholder="Enter your details">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="preview-hr">
                    <div class="row gy-4">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="unit_id">Unit No.</label>
                                <div class="form-control-wrap ">
                                    <div class="form-control-select">
                                        <select class="form-control" id="unit_id" name="unit_id" required>
                                            @foreach ($units as $unit)
                                                <option value="{{ $unit->id }}" {{ $unit->id == $owner->unit->id ? "selected" : "" }}>
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
                                            <option value="{{ $res }}"  {{ $res == $owner->residency_status ? "selected" : "" }}>{{ $res }}</option>    
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
                                            <option value="YES" {{ $owner->is_occupant ? "selected" : "" }}>YES</option>
                                            <option value="NO"  {{ !$owner->is_occupant ? "selected" : "" }}>NO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="preview-hr">
                <div class="row gy-4">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label" for="spa_name">SPA </label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="spa_name" name="spa_name" value="{{ $owner->spa_name }}" placeholder="Enter your details" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label" for="spa_contact_no">SPA Contact </label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="spa_contact_no" name="spa_contact_no" value="{{ $owner->spa_contact_no }}"  placeholder="Enter your details" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label" for="household_name">Household </label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="household_name" name="household_name"  value="{{ $owner->household_name }}" placeholder="Enter your details" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label" for="household_contact_no">Household Contact </label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="household_contact_no" name="household_contact_no" value="{{ $owner->household_contact_no }}" placeholder="Enter your details" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label" for="broker_name">Broker </label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="broker_name" name="broker_name" placeholder="Enter your details" value="{{ $owner->broker_name }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label" for="broker_contact_no">Broker Contact </label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="broker_contact_no" name="broker_contact_no" placeholder="Enter your details" value="{{ $owner->broker_contact_no }}" required>
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
                                <textarea class="form-control" id="address" name="address" required>{{ $owner->address }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label class="form-label" for="default-06">Change Image</label>
                            <div class="form-control-wrap">
                                <div class="form-file">
                                    <input type="file" multiple class="form-file-input" id="customFile" name="image_src" >
                                    <label class="form-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="default-06">Change Proof of Identity</label>
                            <div class="form-control-wrap">
                                <div class="form-file">
                                    <input type="file" multiple class="form-file-input" id="customFile" name="proof_of_identity_src" >
                                    <label class="form-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="default-06">Change Proof of Ownership</label>
                            <div class="form-control-wrap">
                                <div class="form-file">
                                    <input type="file" multiple class="form-file-input" id="customFile" name="proof_of_ownership_src" >
                                    <label class="form-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="default-06">Change Signature</label>
                            <div class="form-control-wrap">
                                <div class="form-file">
                                    <input type="file" multiple class="form-file-input" id="customFile" name="signature_src" >
                                    <label class="form-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="preview-hr">
                <div class="row gy-4">
                    <div class="col-sm-4">
                        <span class="preview-title-lg overline-title">Proof of ownership:</span>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="pow_condo" name="pow_condo" {{ $owner->pow_condo ? "checked" : "" }}>
                            <label class="custom-control-label" for="pow_condo">Condominium Certificate of Title</label>
                        </div>
                        <div class="mt-2"></div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="pow_deeds" name="pow_deeds" {{ $owner->pow_deeds ? "checked" : "" }}>
                            <label class="custom-control-label" for="pow_deeds" >Deed/s of Absolute Sale</label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <span class="preview-title-lg overline-title">SPA & Gov't IDs</span>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="spa_unit_owner" name="spa_unit_owner" {{ $owner->spa_unit_owner ? "checked" : "" }}>
                            <label class="custom-control-label" for="spa_unit_owner">SPA from Unit Owner</label>
                        </div>
                        <div class="mt-2"></div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="spa_spa" name="spa_spa" {{ $owner->spa_spa ? "checked" : "" }}>
                            <label class="custom-control-label" for="spa_spa">2 Government ID of the SPA</label>
                        </div>
                        <div class="mt-2"></div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="spa_all" name="spa_all" {{ $owner->spa_all ? "checked" : "" }}>
                            <label class="custom-control-label" for="spa_all">2 Government ID of All Occupants</label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <span class="preview-title-lg overline-title">Other Requirements</span>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="other_health" name="other_health" {{ $owner->other_health ? "checked" : "" }}>
                            <label class="custom-control-label" for="other_health">Health Certificate of All Occupants</label>
                        </div>
                        <div class="mt-2"></div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="other_utility" name="other_utility" {{ $owner->other_utility ? "checked" : "" }}>
                            <label class="custom-control-label" for="other_utility">Utility Deposit for Owner</label>
                        </div>
                        <div class="mt-2"></div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="other_cleared" name="other_cleared" {{ $owner->other_cleared ? "checked" : "" }}>
                            <label class="custom-control-label" for="other_cleared">Cleared Accounts</label>
                        </div>
                        <div class="mt-2"></div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="other_paid" name="other_paid" {{ $owner->other_paid ? "checked" : "" }}>
                            <label class="custom-control-label" for="other_paid">Paid Utility Bills (current)</label>
                        </div>
                        <div class="mt-2"></div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="other_clearance" name="other_clearance" {{ $owner->other_clearance ? "checked" : "" }}>
                            <label class="custom-control-label" for="other_clearance">Clearance From Security</label>
                        </div>
                        
                    </div>
                    <div class="col-sm-12">
                        <input type="submit" value="Save Changes" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 


@endsection