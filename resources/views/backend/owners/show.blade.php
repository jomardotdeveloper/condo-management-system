@extends("layouts.master")
@section("content")
<div class="nk-block">
    <div class="card">
        <div class="card-aside-wrap">
            <div class="card-content">
                <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><em class="icon ni ni-user-circle"></em><span>Owner Details</span></a>
                    </li>
                </ul>
                <div class="card-inner">
                    <div class="nk-block">
                        <div class="nk-block-head">
                            <h5 class="title">Member Information</h5>
                        </div>
                        <div class="nk-block-head nk-block-head-line">
                            <h6 class="title overline-title text-base">Full Name</h6>
                        </div>
                        <div class="profile-ud-list">
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Title</span>
                                    <span class="profile-ud-value">{{ ucfirst($owner->title) }}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">First Name</span>
                                    <span class="profile-ud-value">{{ ucfirst($owner->first_name) }}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Last Name</span>
                                    <span class="profile-ud-value">{{ ucfirst($owner->last_name) }}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Middle Name</span>
                                    <span class="profile-ud-value">{{ ucfirst($owner->middle_name) }}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Suffix Name</span>
                                    <span class="profile-ud-value">{{ ucfirst($owner->suffix_name) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nk-block">
                        <div class="nk-block-head nk-block-head-line">
                            <h6 class="title overline-title text-base">Personal Information</h6>
                        </div>
                        <div class="profile-ud-list">
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Move in</span>
                                    <span class="profile-ud-value">{{ $owner->move_in_date }}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Move out</span>
                                    <span class="profile-ud-value">{{ $owner->move_out_date }}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Gender</span>
                                    <span class="profile-ud-value">{{ ucfirst($owner->gender) }}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Birthdate</span>
                                    <span class="profile-ud-value">{{ $owner->birthdate }}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Nationality</span>
                                    <span class="profile-ud-value">{{ $owner->nationality }}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Occupation</span>
                                    <span class="profile-ud-value">{{ $owner->occupation }}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Address</span>
                                    <span class="profile-ud-value">{{ $owner->address }}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Contact Number</span>
                                    <span class="profile-ud-value">{{ $owner->contact_no }}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Email Address</span>
                                    <span class="profile-ud-value">{{ $owner->email }}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Residency Status</span>
                                    <span class="profile-ud-value">{{ $owner->residency_status }}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">SPA Name</span>
                                    <span class="profile-ud-value">{{ $owner->spa_name }}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">SPA Contact #</span>
                                    <span class="profile-ud-value">{{ $owner->contact_no }}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Household Name</span>
                                    <span class="profile-ud-value">{{ $owner->household_name }}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Household Contact #</span>
                                    <span class="profile-ud-value">{{ $owner->household_contact_no }}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Broker Name</span>
                                    <span class="profile-ud-value">{{ $owner->broker_name }}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Broker Contact #</span>
                                    <span class="profile-ud-value">{{ $owner->broker_contact_no }}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Utility Bond</span>
                                    <span class="profile-ud-value">{{ $owner->utility_bond }}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Remarks</span>
                                    <span class="profile-ud-value">{{ $owner->remarks }}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Electric Reading</span>
                                    <span class="profile-ud-value">{{ $owner->electric_reading }}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Water Reading</span>
                                    <span class="profile-ud-value">{{ $owner->water_reading }}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">OR Number</span>
                                    <span class="profile-ud-value">{{ $owner->or_number }}</span>
                                </div>
                            </div>
                            <div class="profile-ud-item">
                                <div class="profile-ud wider">
                                    <span class="profile-ud-label">Unit Number</span>
                                    <span class="profile-ud-value">{{ $owner->unit->unit_number }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-aside card-aside-right user-aside toggle-slide toggle-slide-right toggle-break-xxl" data-content="userAside" data-toggle-screen="xxl" data-toggle-overlay="true" data-toggle-body="true">
                <div class="card-inner-group" data-simplebar>
                    <div class="card-inner">
                        <div class="user-card user-card-s2">
                            @if ($owner->image_src)
                                <div class="user-avatar lg bg-primary">
                                    <img src="{{ $owner->image_src }}" alt="">
                                </div>
                            @else
                            <div class="user-avatar lg bg-primary">
                                <span>{{ $owner->first_name[0] . $owner->first_name[1] }}</span>
                            </div>
                            @endif
                            <div class="user-info">
                                <div class="badge bg-outline-light rounded-pill ucap">Unit Owner</div>
                                <h5>{{ $owner->full_name }}</h5>
                                <span class="sub-text">{{ $owner->email }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-inner">
                        <div class="overline-title-alt mb-2">Requirements</div>
                        <div class="profile-balance">
                            <div class="profile-balance-group gx-4">
                                <div class="profile-balance-sub">
                                    <a href="{{ $owner->proof_of_identity_src }}" download class="btn btn-sm btn-primary">
                                        Download proof of identity
                                    </a>
                                </div>
                                <div class="profile-balance-sub">
                                    <a href="{{ $owner->proof_of_ownership_src }}"  download class="btn btn-sm btn-primary">
                                        Download proof of ownership
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-inner">
                        <h6 class="overline-title-alt mb-3">Submitted</h6>
                        <ul class="g-1">
                            @foreach ($owner->submitted_requirements as $req)
                            <li class="btn-group">
                                <a class="btn btn-xs btn-light btn-dim" href="#">{{$req}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-inner">
                        <h6 class="overline-title-alt mb-3">Remaining</h6>
                        <ul class="g-1">
                            @foreach ($owner->remaining_requirements as $req)
                            <li class="btn-group">
                                <a class="btn btn-xs btn-light btn-dim" href="#">{{$req}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection