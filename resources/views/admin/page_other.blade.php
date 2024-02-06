@extends('admin.layout.app')


@section('heading','Other Page Content')


@section('main_content')

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('admin_other_page_update') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row custom-tap">

                            <div class="col-lg-3 col-md-12">
                                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                                    <button class="nav-link active" id="v-pills-1-tab" data-bs-toggle="pill" data-bs-target="#v-pills-1" type="button" role="tab" aria-controls="v-pills-1" aria-selected="true">Login Page</button>

                                    <button class="nav-link" id="v-pills-2-tab" data-bs-toggle="pill" data-bs-target="#v-pills-2" type="button" role="tab" aria-controls="v-pills-2" aria-selected="false">Signup Page</button>

                                    <button class="nav-link" id="v-pills-3-tab" data-bs-toggle="pill" data-bs-target="#v-pills-3" type="button" role="tab" aria-controls="v-pills-3" aria-selected="false">Forget Password Page</button>

                                    <button class="nav-link" id="v-pills-4-tab" data-bs-toggle="pill" data-bs-target="#v-pills-4" type="button" role="tab" aria-controls="v-pills-4" aria-selected="false">Job Listing Page</button>

                                    <button class="nav-link" id="v-pills-5-tab" data-bs-toggle="pill" data-bs-target="#v-pills-5" type="button" role="tab" aria-controls="v-pills-5" aria-selected="false">Company Listing Page</button>


                                  </div>
                            </div>
                            {{-- end buttons --}}

                            <div class="col-lg-9 col-md-12">
                                <div class="tab-content" id="v-pills-tabContent">

                                    {{-- login section start --}}
                                    <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab" tabindex="0">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-4">
                                                        <label class="form-label">Heading*</label>
                                                        <input type="text" class="form-control" name="login_page_heading" value="{{ $page_other_data->login_page_heading }}">
                                                    </div>
                                                    <div class="mb-4">
                                                        <label class="form-label">Title</label>
                                                        <input type="text" class="form-control" name="login_page_title" value="{{ $page_other_data->login_page_title }}">
                                                    </div>
                                                    <div class="mb-4">
                                                        <label class="form-label">Meta Description</label>
                                                        <input type="text" class="form-control" name="login_page_meta_description" value="{{ $page_other_data->login_page_meta_description }}">
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    {{-- login section end --}}

                                    {{-- signup section start --}}
                                    <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab" tabindex="0">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label">Heading*</label>
                                                    <input type="text" class="form-control" name="signup_page_heading" value="{{ $page_other_data->signup_page_heading }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" class="form-control" name="signup_page_title" value="{{ $page_other_data->signup_page_title }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Meta Description</label>
                                                    <input type="text" class="form-control" name="signup_page_meta_description" value="{{ $page_other_data->signup_page_meta_description }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- signup section end --}}

                                    {{-- forget password section start --}}
                                    <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab" tabindex="0">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label">Heading*</label>
                                                    <input type="text" class="form-control" name="forget_password_page_heading" value="{{ $page_other_data->forget_password_page_heading }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" class="form-control" name="forget_password_page_title" value="{{ $page_other_data->forget_password_page_title }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Meta Description</label>
                                                    <input type="text" class="form-control" name="forget_password_page_meta_description" value="{{ $page_other_data->forget_password_page_meta_description }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- forget password section end --}}


                                    {{-- job listing section start --}}
                                    <div class="tab-pane fade" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-4-tab" tabindex="0">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label">Heading*</label>
                                                    <input type="text" class="form-control" name="job_listing_page_heading" value="{{ $page_other_data->job_listing_page_heading }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" class="form-control" name="job_listing_page_title" value="{{ $page_other_data->job_listing_page_title }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Meta Description</label>
                                                    <input type="text" class="form-control" name="job_listing_page_meta_description" value="{{ $page_other_data->job_listing_page_meta_description }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- job listing section end --}}


                                    {{-- company listing section start --}}
                                    <div class="tab-pane fade" id="v-pills-5" role="tabpanel" aria-labelledby="v-pills-5-tab" tabindex="0">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label">Heading*</label>
                                                    <input type="text" class="form-control" name="company_listing_page_heading" value="{{ $page_other_data->company_listing_page_heading }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" class="form-control" name="company_listing_page_title" value="{{ $page_other_data->company_listing_page_title }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Meta Description</label>
                                                    <input type="text" class="form-control" name="company_listing_page_meta_description" value="{{ $page_other_data->company_listing_page_meta_description }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- company listing section end --}}

                                  </div>

                                  <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
