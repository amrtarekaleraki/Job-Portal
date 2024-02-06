@extends('admin.layout.app')


@section('heading','Banners Page Content')


@section('main_content')

<div class="section-body">
    <form action="{{ route('admin_banner_page_update') }}" method="post" enctype="multipart/form-data">
    @csrf
            <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                    <h4>Job Listing</h4>
                                    <div class="form-group mb-3">
                                        <label>Existing Banner</label>
                                        <div>
                                            <img src="{{ asset('uploads/'.$banner_data->banner_job_listing) }}" alt="" class="w_200">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Change Banner</label>
                                        <div>
                                            <input type="file" name="banner_job_listing">
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    {{-- job detail --}}
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                    <h4>Job Detail</h4>
                                    <div class="form-group mb-3">
                                        <label>Existing Banner</label>
                                        <div>
                                            <img src="{{ asset('uploads/'.$banner_data->banner_job_detail) }}" alt="" class="w_200">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Change Banner</label>
                                        <div>
                                            <input type="file" name="banner_job_detail">
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                      {{-- job categories --}}
                      <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                    <h4>Job Categories</h4>
                                    <div class="form-group mb-3">
                                        <label>Existing Banner</label>
                                        <div>
                                            <img src="{{ asset('uploads/'.$banner_data->banner_job_categories) }}" alt="" class="w_200">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Change Banner</label>
                                        <div>
                                            <input type="file" name="banner_job_categories">
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    {{-- company_listing --}}
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                    <h4>Company Listing</h4>
                                    <div class="form-group mb-3">
                                        <label>Existing Banner</label>
                                        <div>
                                            <img src="{{ asset('uploads/'.$banner_data->banner_company_listing) }}" alt="" class="w_200">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Change Banner</label>
                                        <div>
                                            <input type="file" name="banner_company_listing">
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    {{-- company_detail --}}
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                    <h4>Company Detail</h4>
                                    <div class="form-group mb-3">
                                        <label>Existing Banner</label>
                                        <div>
                                            <img src="{{ asset('uploads/'.$banner_data->banner_company_detail) }}" alt="" class="w_200">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Change Banner</label>
                                        <div>
                                            <input type="file" name="banner_company_detail">
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    {{-- banner_pricing --}}
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                    <h4>Banner Bricing</h4>
                                    <div class="form-group mb-3">
                                        <label>Existing Banner</label>
                                        <div>
                                            <img src="{{ asset('uploads/'.$banner_data->banner_pricing) }}" alt="" class="w_200">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Change Banner</label>
                                        <div>
                                            <input type="file" name="banner_pricing">
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                     {{-- banner_blog --}}
                     <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                    <h4>Banner Blog</h4>
                                    <div class="form-group mb-3">
                                        <label>Existing Banner</label>
                                        <div>
                                            <img src="{{ asset('uploads/'.$banner_data->banner_blog) }}" alt="" class="w_200">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Change Banner</label>
                                        <div>
                                            <input type="file" name="banner_blog">
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    {{-- banner_post --}}
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                    <h4>Banner Post</h4>
                                    <div class="form-group mb-3">
                                        <label>Existing Banner</label>
                                        <div>
                                            <img src="{{ asset('uploads/'.$banner_data->banner_post) }}" alt="" class="w_200">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Change Banner</label>
                                        <div>
                                            <input type="file" name="banner_post">
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    {{-- banner_faq --}}
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                    <h4>Banner Faq</h4>
                                    <div class="form-group mb-3">
                                        <label>Existing Banner</label>
                                        <div>
                                            <img src="{{ asset('uploads/'.$banner_data->banner_faq) }}" alt="" class="w_200">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Change Banner</label>
                                        <div>
                                            <input type="file" name="banner_faq">
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    {{-- banner_contact --}}
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                    <h4>Banner Contact</h4>
                                    <div class="form-group mb-3">
                                        <label>Existing Banner</label>
                                        <div>
                                            <img src="{{ asset('uploads/'.$banner_data->banner_contact) }}" alt="" class="w_200">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Change Banner</label>
                                        <div>
                                            <input type="file" name="banner_contact">
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    {{-- banner_terms --}}
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                    <h4>Banner Terms</h4>
                                    <div class="form-group mb-3">
                                        <label>Existing Banner</label>
                                        <div>
                                            <img src="{{ asset('uploads/'.$banner_data->banner_terms) }}" alt="" class="w_200">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Change Banner</label>
                                        <div>
                                            <input type="file" name="banner_terms">
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    {{-- banner_privacy --}}
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                    <h4>Banner Privacy</h4>
                                    <div class="form-group mb-3">
                                        <label>Existing Banner</label>
                                        <div>
                                            <img src="{{ asset('uploads/'.$banner_data->banner_privacy) }}" alt="" class="w_200">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Change Banner</label>
                                        <div>
                                            <input type="file" name="banner_privacy">
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    {{-- banner_signup --}}
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                    <h4>Banner Signup</h4>
                                    <div class="form-group mb-3">
                                        <label>Existing Banner</label>
                                        <div>
                                            <img src="{{ asset('uploads/'.$banner_data->banner_signup) }}" alt="" class="w_200">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Change Banner</label>
                                        <div>
                                            <input type="file" name="banner_signup">
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    {{-- banner_login --}}
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                    <h4>Banner Login</h4>
                                    <div class="form-group mb-3">
                                        <label>Existing Banner</label>
                                        <div>
                                            <img src="{{ asset('uploads/'.$banner_data->banner_login) }}" alt="" class="w_200">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Change Banner</label>
                                        <div>
                                            <input type="file" name="banner_login">
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    {{-- banner_forget_password --}}
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                    <h4>Banner Forget Password</h4>
                                    <div class="form-group mb-3">
                                        <label>Existing Banner</label>
                                        <div>
                                            <img src="{{ asset('uploads/'.$banner_data->banner_forget_password) }}" alt="" class="w_200">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Change Banner</label>
                                        <div>
                                            <input type="file" name="banner_forget_password">
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    {{-- banner_company_panel --}}
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                    <h4>Banner Company Panel</h4>
                                    <div class="form-group mb-3">
                                        <label>Existing Banner</label>
                                        <div>
                                            <img src="{{ asset('uploads/'.$banner_data->banner_company_panel) }}" alt="" class="w_200">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Change Banner</label>
                                        <div>
                                            <input type="file" name="banner_company_panel">
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    {{-- banner_candidate_panel --}}
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                    <h4>Banner candidate panel</h4>
                                    <div class="form-group mb-3">
                                        <label>Existing Banner</label>
                                        <div>
                                            <img src="{{ asset('uploads/'.$banner_data->banner_candidate_panel) }}" alt="" class="w_200">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Change Banner</label>
                                        <div>
                                            <input type="file" name="banner_candidate_panel">
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>






            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
    </form>
</div>

@endsection
