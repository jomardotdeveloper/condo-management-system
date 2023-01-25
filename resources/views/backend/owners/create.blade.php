@extends("layouts.master")
@section("content")
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">New unit owner</h4>
        </div>
    </div>
    <div class="card card-bordered card-preview mt-2">
        <div class="card-inner">
            <div class="preview-block">
                <span class="preview-title-lg overline-title">Unit owner form</span>
                <div class="row gy-4">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label" for="default-01">Input text Default</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="default-01" placeholder="Input placeholder">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label" for="default-05">Input with Text</label>
                            <div class="form-control-wrap">
                                <div class="form-text-hint">
                                    <span class="overline-title">Usd</span>
                                </div>
                                <input type="text" class="form-control" id="default-05" placeholder="Input placeholder">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label" for="default-03">Input with Icon Left</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-left">
                                    <em class="icon ni ni-user"></em>
                                </div>
                                <input type="text" class="form-control" id="default-03" placeholder="Input placeholder">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="default-04">Input with Icon Right</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-mail"></em>
                                </div>
                                <input type="text" class="form-control" id="default-04" placeholder="Input placeholder">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label" for="default-textarea">Textarea</label>
                            <div class="form-control-wrap">
                                <textarea class="form-control no-resize" id="default-textarea">Large text area content</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label" for="default-06">Default File Upload</label>
                            <div class="form-control-wrap">
                                <div class="form-file">
                                    <input type="file" multiple class="form-file-input" id="customFile">
                                    <label class="form-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="default-06">Default Select</label>
                            <div class="form-control-wrap ">
                                <div class="form-control-select">
                                    <select class="form-control" id="default-06">
                                        <option value="default_option">Default Option</option>
                                        <option value="option_select_name">Option select name</option>
                                        <option value="option_select_name">Option select name</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label" for="default-07">Default Select Multiple</label>
                            <div class="form-control-wrap">
                                <div class="form-control-select-multiple">
                                    <select class="form-select" id="default-07" multiple aria-label="multiple select example">
                                        <option value="option_select0">Default Option</option>
                                        <option value="option_select1">Option select name</option>
                                        <option value="option_select2">Option select name</option>
                                        <option value="option_select2">Option select name</option>
                                        <option value="option_select2">Option select name</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="preview-hr">
                <span class="preview-title-lg overline-title">State Preview</span>
                <div class="row gy-4">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label" for="default-1-01">Focus State</label>
                            <input type="text" class="form-control focus" id="default-1-01" placeholder="Input placeholder">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label" for="default-1-02">Filled State</label>
                            <input type="text" class="form-control" id="default-1-02" value="Abu Bin Ishtiyak">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label" for="default-1-04">Error State</label>
                            <input type="text" class="form-control error" id="default-1-04" placeholder="Input placeholder">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label" for="default-1-03">Disabled State</label>
                            <input type="text" class="form-control" id="default-1-03" disabled value="info@softnio.com">
                        </div>
                    </div>
                </div>
                <hr class="preview-hr">
                <span class="preview-title-lg overline-title">Size Preview </span>
                <div class="row gy-4 align-center">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <input type="text" class="form-control form-control-lg" placeholder="Input Large">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" placeholder="Input Regular">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <input type="text" class="form-control form-control-sm" placeholder="Input Small">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <p class="text-soft">Use <code>.form-control-lg</code> or <code>.form-control-sm</code> with <code>.form-control</code> for large or small input box.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 


@endsection