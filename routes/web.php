<?php

use Illuminate\Support\Facades\Route;

//front
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\TermsController;
use App\Http\Controllers\Front\PrivacyController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\JobCategoryController;
use App\Http\Controllers\Front\PostController;
use App\Http\Controllers\Front\FrontFaqController;
use App\Http\Controllers\Front\PricingController;
use App\Http\Controllers\Front\LoginController;
use App\Http\Controllers\Front\SignupController;
use App\Http\Controllers\Front\ForgetPasswordController;
use App\Http\Controllers\Front\JobListingController;
use App\Http\Controllers\Front\CompanyListingController;
use App\Http\Controllers\Front\SubscriberController;


//company
use App\Http\Controllers\Company\CompanyController;

//Candidate
use App\Http\Controllers\Candidate\CandidateController;


// admin
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminHomePageController;
use App\Http\Controllers\Admin\AdminJobCategoryController;
use App\Http\Controllers\Admin\AdminWhyChooseController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\AdminPackageController;
use App\Http\Controllers\Admin\AdminFaqPageController;
use App\Http\Controllers\Admin\AdminBlogPageController;
use App\Http\Controllers\Admin\AdminTermPageController;
use App\Http\Controllers\Admin\AdminPrivacyPageController;
use App\Http\Controllers\Admin\AdminContactPageController;
use App\Http\Controllers\Admin\AdminJobCategoryPageController;
use App\Http\Controllers\Admin\AdminPricingPageController;
use App\Http\Controllers\Admin\AdminOtherPageController;
use App\Http\Controllers\Admin\AdminJobLocationController;
use App\Http\Controllers\Admin\AdminJobTypeController;
use App\Http\Controllers\Admin\AdminJobExperienceController;
use App\Http\Controllers\Admin\AdminJobGenderController;
use App\Http\Controllers\Admin\AdminJobSalaryRangeController;
use App\Http\Controllers\Admin\AdminCompanyLocationController;
use App\Http\Controllers\Admin\AdminCompanyIndustryController;
use App\Http\Controllers\Admin\AdminCompanySizeController;
use App\Http\Controllers\Admin\AdminAdvertisementController;
use App\Http\Controllers\Admin\AdminBannerController;
use App\Http\Controllers\Admin\AdminSubscriberController;
use App\Http\Controllers\Admin\AdminSettingController;




// //////front//////////////

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('terms-of-use',[TermsController::class,'index'])->name('terms');
Route::get('privacy-policy',[PrivacyController::class,'index'])->name('privacy');
Route::get('job-categories',[JobCategoryController::class,'categories'])->name('job_categories');
Route::get('blog',[PostController::class,'index'])->name('blog');
Route::get('post/{slug}',[PostController::class,'detail'])->name('post');
Route::get('faq',[FrontFaqController::class,'index'])->name('faq');
Route::get('contact',[ContactController::class,'index'])->name('contact');
Route::post('contact/submit',[ContactController::class,'submit'])->name('contact_submit');
Route::get('pricing',[PricingController::class,'index'])->name('pricing');

/////// job listing ////////////////////////////////////
Route::get('job-listing',[JobListingController::class,'index'])->name('job_listing');
Route::get('job-detail/{id}',[JobListingController::class,'detail'])->name('job');
Route::post('job-enquery/email',[JobListingController::class,'send_email'])->name('job_enquery_send_email');

/////// Company listing ////////////////////////////////////
Route::get('company-listing',[CompanyListingController::class,'index'])->name('company_listing');
Route::get('company-detail/{id}',[CompanyListingController::class,'detail'])->name('company');
Route::post('company-enquery/email',[CompanyListingController::class,'send_email'])->name('company_enquery_send_email');



Route::get('login',[LoginController::class,'index'])->name('login');
Route::get('create-account',[SignupController::class,'index'])->name('signup');

Route::post('subscriber/send-email',[SubscriberController::class,'send_email'])->name('subscriber_send_email');
Route::get('subscriber/verify/{email}/{token}', [SubscriberController::class, 'verify'])->name('subscriber_email_verify');



// company-password //
Route::get('forget-password/company',[ForgetPasswordController::class,'company_forget_password'])->name('company_forget_password');
Route::post('forget-password/company/submit',[ForgetPasswordController::class,'company_forget_passsword_submit'])->name('company_forget_passsword_submit');
Route::get('/reset-password/company/{token}/{email}',[ForgetPasswordController::class,'company_reset_password'])->name('company_reset_password');
Route::post('/reset-password/company/submit',[ForgetPasswordController::class,'company_reset_password_submit'])->name('company_reset_password_submit');


/*company*/
Route::post('company_login_submit',[LoginController::class,'company_login_submit'])->name('company_login_submit');
Route::post('company_signup_submit',[SignupController::class,'company_signup_submit'])->name('company_signup_submit');
Route::get('company_signup_verify/{token}/{email}',[SignupController::class,'company_signup_verify'])->name('company_signup_verify');
Route::get('/company/logout',[LoginController::class,'company_logout'])->name('company_logout');

/*company middleware*/
Route::middleware(['company:company'])->group(function(){
    Route::get('/company/dashboard',[CompanyController::class,'dashboard'])->name('company_dashboard');
    Route::get('/company/make-payment',[CompanyController::class,'make_payment'])->name('company_make_payment');
    Route::get('/company/orders',[CompanyController::class,'orders'])->name('company_orders');

    // edit profile
    Route::get('/company/edit-profile',[CompanyController::class,'edit_profile'])->name('company_edit_profile');
    Route::post('/company/edit-profile/update',[CompanyController::class,'edit_profile_update'])->name('company_edit_profile_update');

    // edit password
    Route::get('/company/edit-password',[CompanyController::class,'edit_password'])->name('company_edit_password');
    Route::post('/company/edit-password/update',[CompanyController::class,'edit_password_update'])->name('company_edit_password_update');

    ////////// photos /////////////////////////
    Route::get('/company/photos',[CompanyController::class,'photos'])->name('company_photos');
    Route::post('/company/photos/submit',[CompanyController::class,'photos_submit'])->name('company_photos_submit');
    Route::get('/company/photos/delete/{id}',[CompanyController::class,'photos_delete'])->name('company_photos_delete');


    ////////// videos /////////////////////////
    Route::get('/company/videos',[CompanyController::class,'videos'])->name('company_videos');
    Route::post('/company/videos/submit',[CompanyController::class,'videos_submit'])->name('company_videos_submit');
    Route::get('/company/videos/delete/{id}',[CompanyController::class,'videos_delete'])->name('company_videos_delete');


    ////////// create job /////////////////////////
    Route::get('/company/create-job',[CompanyController::class,'jobs_create'])->name('company_jobs_create');
    Route::post('/company/create-job-submit',[CompanyController::class,'jobs_create_submit'])->name('company_jobs_create_submit');
    Route::get('/company/jobs',[CompanyController::class,'jobs'])->name('company_jobs');
    Route::get('/company/job-edit/{id}',[CompanyController::class,'jobs_edit'])->name('company_jobs_edit');
    Route::post('/company/job-update/{id}',[CompanyController::class,'jobs_update'])->name('company_jobs_update');
    Route::get('/company/job-delete/{id}',[CompanyController::class,'jobs_delete'])->name('company_jobs_delete');


    ////////// company applications  /////////////////////////
    Route::get('/company/candidate-applications',[CompanyController::class,'candidate_applications'])->name('company_candidate_applications');
    Route::get('/company/applicants/{id}',[CompanyController::class,'applicants'])->name('company_applicants');
    Route::get('/company/applicant-resume/{id}',[CompanyController::class,'applicant_resume'])->name('company_applicant_resume');
    Route::post('/company/application-status-change',[CompanyController::class,'application_status_change'])->name('company_application_status_change');





    /* PayPal */
    Route::post('/company/paypal/payment', [CompanyController::class, 'paypal'])->name('company_paypal');
    Route::get('/company/paypal/success', [CompanyController::class, 'paypal_success'])->name('company_paypal_success');
    Route::get('/company/paypal/cancel', [CompanyController::class, 'paypal_cancel'])->name('company_paypal_cancel');
    //* stripe *//
    Route::post('/company/stripe/payment', [CompanyController::class, 'stripe'])->name('company_stripe');
    Route::get('/company/stripe/success', [CompanyController::class, 'stripe_success'])->name('company_stripe_success');
    Route::get('/company/stripe/cancel', [CompanyController::class, 'stripe_cancel'])->name('company_stripe_cancel');


});


/*candidate*/
Route::post('candidate_login_submit',[LoginController::class,'candidate_login_submit'])->name('candidate_login_submit');
Route::post('candidate_signup_submit',[SignupController::class,'candidate_signup_submit'])->name('candidate_signup_submit');
Route::get('candidate_signup_verify/{token}/{email}',[SignupController::class,'candidate_signup_verify'])->name('candidate_signup_verify');
Route::get('/candidate/logout',[LoginController::class,'candidate_logout'])->name('candidate_logout');

// candidate-password //
Route::get('forget-password/candidate',[ForgetPasswordController::class,'candidate_forget_password'])->name('candidate_forget_password');
Route::post('forget-password/candidate/submit',[ForgetPasswordController::class,'candidate_forget_passsword_submit'])->name('candidate_forget_passsword_submit');
Route::get('/reset-password/candidate/{token}/{email}',[ForgetPasswordController::class,'candidate_reset_password'])->name('candidate_reset_password');
Route::post('/reset-password/candidate/submit',[ForgetPasswordController::class,'candidate_reset_password_submit'])->name('candidate_reset_password_submit');

/*candidate middleware*/
Route::middleware(['candidate:candidate'])->group(function(){
    Route::get('/candidate/dashboard',[CandidateController::class,'dashboard'])->name('candidate_dashboard');
    // edit profile
    Route::get('/candidate/edit-profile',[CandidateController::class,'edit_profile'])->name('candidate_edit_profile');
    Route::post('/candidate/edit-profile/update',[CandidateController::class,'edit_profile_update'])->name('candidate_edit_profile_update');
    // edit password
    Route::get('/candidate/edit-password',[CandidateController::class,'edit_password'])->name('candidate_edit_password');
    Route::post('/candidate/edit-password/update',[CandidateController::class,'edit_password_update'])->name('candidate_edit_password_update');
    // candidate education /////////////////////////////////////////////
    Route::get('/candidate/education/view',[CandidateController::class,'education'])->name('candidate_education');
    Route::get('/candidate/education/create',[CandidateController::class,'education_create'])->name('candidate_education_create');
    Route::post('/candidate/education/store',[CandidateController::class,'education_store'])->name('candidate_education_store');
    Route::get('/candidate/education/edit/{id}',[CandidateController::class,'education_edit'])->name('candidate_education_edit');
    Route::post('/candidate/education/update/{id}',[CandidateController::class,'education_update'])->name('candidate_education_update');
    Route::get('/candidate/education/delete/{id}',[CandidateController::class,'education_delete'])->name('candidate_education_delete');
    // candidate skills /////////////////////////////////////////////
    Route::get('/candidate/skill/view',[CandidateController::class,'skill'])->name('candidate_skill');
    Route::get('/candidate/skill/create',[CandidateController::class,'skill_create'])->name('candidate_skill_create');
    Route::post('/candidate/skill/store',[CandidateController::class,'skill_store'])->name('candidate_skill_store');
    Route::get('/candidate/skill/edit/{id}',[CandidateController::class,'skill_edit'])->name('candidate_skill_edit');
    Route::post('/candidate/skill/update/{id}',[CandidateController::class,'skill_update'])->name('candidate_skill_update');
    Route::get('/candidate/skill/delete/{id}',[CandidateController::class,'skill_delete'])->name('candidate_skill_delete');
    // candidate experience /////////////////////////////////////////////
    Route::get('/candidate/experience/view',[CandidateController::class,'experience'])->name('candidate_experience');
    Route::get('/candidate/experience/create',[CandidateController::class,'experience_create'])->name('candidate_experience_create');
    Route::post('/candidate/experience/store',[CandidateController::class,'experience_store'])->name('candidate_experience_store');
    Route::get('/candidate/experience/edit/{id}',[CandidateController::class,'experience_edit'])->name('candidate_experience_edit');
    Route::post('/candidate/experience/update/{id}',[CandidateController::class,'experience_update'])->name('candidate_experience_update');
    Route::get('/candidate/experience/delete/{id}',[CandidateController::class,'experience_delete'])->name('candidate_experience_delete');
    // candidate awards /////////////////////////////////////////////
    Route::get('/candidate/award/view',[CandidateController::class,'award'])->name('candidate_award');
    Route::get('/candidate/award/create',[CandidateController::class,'award_create'])->name('candidate_award_create');
    Route::post('/candidate/award/store',[CandidateController::class,'award_store'])->name('candidate_award_store');
    Route::get('/candidate/award/edit/{id}',[CandidateController::class,'award_edit'])->name('candidate_award_edit');
    Route::post('/candidate/award/update/{id}',[CandidateController::class,'award_update'])->name('candidate_award_update');
    Route::get('/candidate/award/delete/{id}',[CandidateController::class,'award_delete'])->name('candidate_award_delete');
     // candidate resume /////////////////////////////////////////////
     Route::get('/candidate/resume/view',[CandidateController::class,'resume'])->name('candidate_resume');
     Route::get('/candidate/resume/create',[CandidateController::class,'resume_create'])->name('candidate_resume_create');
     Route::post('/candidate/resume/store',[CandidateController::class,'resume_store'])->name('candidate_resume_store');
     Route::get('/candidate/resume/edit/{id}',[CandidateController::class,'resume_edit'])->name('candidate_resume_edit');
     Route::post('/candidate/resume/update/{id}',[CandidateController::class,'resume_update'])->name('candidate_resume_update');
     Route::get('/candidate/resume/delete/{id}',[CandidateController::class,'resume_delete'])->name('candidate_resume_delete');

    //  bookmark /////////////////////////////////////////////////
    Route::get('/candidate/bookmark-add/{id}',[CandidateController::class,'bookmark_add'])->name('candidate_bookmark_add');
    Route::get('/candidate/bookmark-view',[CandidateController::class,'bookmark_view'])->name('candidate_bookmark_view');
    Route::get('/candidate/bookmark-delete/{id}',[CandidateController::class,'bookmark_delete'])->name('candidate_bookmark_delete');

    // apply ////////////////////////////////////////////////////////////////////////////////////////
    Route::get('/candidate/apply/{id}',[CandidateController::class,'apply'])->name('candidate_apply');
    Route::post('/candidate/apply-submit/{id}',[CandidateController::class,'apply_submit'])->name('candidate_apply_submit');
    Route::get('/candidate/applications',[CandidateController::class,'applications'])->name('candidate_applications');


});


/* Admin Routes */
Route::get('/admin/login',[AdminLoginController::class,'index'])->name('admin_login');
Route::post('/admin/login-submit',[AdminLoginController::class,'login_submit'])->name('admin_login_submit');
Route::get('/admin/logout',[AdminLoginController::class,'logout'])->name('admin_logout');
Route::get('/admin/forget_pasword',[AdminLoginController::class,'forget_pasword'])->name('admin_forget_pasword');
Route::post('/admin/forget-password-submit',[AdminLoginController::class,'forget_password_submit'])->name('admin_forget_pasword_submit');
Route::get('/admin/reset-password/{token}/{email}',[AdminLoginController::class,'reset_pasword'])->name('admin_reset_pasword');
Route::post('/admin/reset-password-submit',[AdminLoginController::class,'reset_password_submit'])->name('admin_reset_pasword_submit');


//* admin middleware*/
Route::middleware(['admin:admin'])->group(function(){
Route::get('/admin/home',[AdminHomeController::class,'index'])->name('admin_home');

Route::get('/admin/edit-profile',[AdminProfileController::class,'index'])->name('admin_profile');
Route::post('/admin/edit-profile-submit',[AdminProfileController::class,'profile_submit'])->name('admin_profile_submit');

// home page ////////////
Route::get('/admin/home-page',[AdminHomePageController::class,'index'])->name('admin_home_page');
Route::post('/admin/home/update',[AdminHomePageController::class,'update'])->name('admin_home_update');

// faq page ////////////
Route::get('/admin/faq-page',[AdminFaqPageController::class,'index'])->name('admin_faq_page');
Route::post('/admin/faq-page/update',[AdminFaqPageController::class,'update'])->name('admin_faq_page_update');

// blog page ////////////
Route::get('/admin/blog-page',[AdminBlogPageController::class,'index'])->name('admin_blog_page');
Route::post('/admin/blog-page/update',[AdminBlogPageController::class,'update'])->name('admin_blog_page_update');

// term page ////////////
Route::get('/admin/term-page',[AdminTermPageController::class,'index'])->name('admin_term_page');
Route::post('/admin/term-page/update',[AdminTermPageController::class,'update'])->name('admin_term_page_update');


// privacy page ////////////
Route::get('/admin/privacy-page',[AdminPrivacyPageController::class,'index'])->name('admin_privacy_page');
Route::post('/admin/privacy-page/update',[AdminPrivacyPageController::class,'update'])->name('admin_privacy_page_update');


// job categories page ////////////
Route::get('/admin/job-category-page',[AdminJobCategoryPageController::class,'index'])->name('admin_job_category_page');
Route::post('/admin/job-category-page/update',[AdminJobCategoryPageController::class,'update'])->name('admin_job_category_page_update');

// contact page ////////////
Route::get('/admin/contact-page',[AdminContactPageController::class,'index'])->name('admin_contact_page');
Route::post('/admin/contact-page/update',[AdminContactPageController::class,'update'])->name('admin_contact_page_update');

// pricing page ////////////
Route::get('/admin/pricing-page',[AdminPricingPageController::class,'index'])->name('admin_pricing_page');
Route::post('/admin/pricing-page/update',[AdminPricingPageController::class,'update'])->name('admin_pricing_page_update');


// other page ////////////
Route::get('/admin/other-page',[AdminOtherPageController::class,'index'])->name('admin_other_page');
Route::post('/admin/other-page/update',[AdminOtherPageController::class,'update'])->name('admin_other_page_update');


// advertisement page ////////////
Route::get('/admin/advertisement',[AdminAdvertisementController::class,'index'])->name('admin_advertisement_page');
Route::post('/admin/advertisement/update',[AdminAdvertisementController::class,'update'])->name('admin_advertisement_page_update');

// Banners page ////////////
Route::get('/admin/banner',[AdminBannerController::class,'index'])->name('admin_banner_page');
Route::post('/admin/banner/update',[AdminBannerController::class,'update'])->name('admin_banner_page_update');


// subscribers page ////////////
Route::get('/admin/all-subscribers', [AdminSubscriberController::class, 'all_subscribers'])->name('admin_all_subscribers');
Route::get('/admin/subscribers-send-email', [AdminSubscriberController::class, 'send_email'])->name('admin_subscribers_send_email');
Route::post('/admin/subscribers-send-email-submit', [AdminSubscriberController::class, 'send_email_submit'])->name('admin_subscribers_send_email_submit');
Route::get('/admin/subscriber-delete/{id}', [AdminSubscriberController::class, 'delete'])->name('admin_subscriber_delete');


// job category /////////////////////////////////////////////
Route::get('/admin/job-category/view',[AdminJobCategoryController::class,'index'])->name('admin_job_category');
Route::get('/admin/job-category/create',[AdminJobCategoryController::class,'create'])->name('admin_job_category_create');
Route::post('/admin/job-category/store',[AdminJobCategoryController::class,'store'])->name('admin_job_category_store');
Route::get('/admin/job-category/edit/{id}',[AdminJobCategoryController::class,'edit'])->name('admin_job_category_edit');
Route::post('/admin/job-category/update/{id}',[AdminJobCategoryController::class,'update'])->name('admin_job_category_update');
Route::get('/admin/job-category/delete/{id}',[AdminJobCategoryController::class,'delete'])->name('admin_job_category_delete');


// job location /////////////////////////////////////////////
Route::get('/admin/job-location/view',[AdminJoblocationController::class,'index'])->name('admin_job_location');
Route::get('/admin/job-location/create',[AdminJoblocationController::class,'create'])->name('admin_job_location_create');
Route::post('/admin/job-location/store',[AdminJoblocationController::class,'store'])->name('admin_job_location_store');
Route::get('/admin/job-location/edit/{id}',[AdminJoblocationController::class,'edit'])->name('admin_job_location_edit');
Route::post('/admin/job-location/update/{id}',[AdminJoblocationController::class,'update'])->name('admin_job_location_update');
Route::get('/admin/job-location/delete/{id}',[AdminJoblocationController::class,'delete'])->name('admin_job_location_delete');

// job type /////////////////////////////////////////////
Route::get('/admin/job-type/view',[AdminJobTypeController::class,'index'])->name('admin_job_type');
Route::get('/admin/job-type/create',[AdminJobTypeController::class,'create'])->name('admin_job_type_create');
Route::post('/admin/job-type/store',[AdminJobTypeController::class,'store'])->name('admin_job_type_store');
Route::get('/admin/job-type/edit/{id}',[AdminJobTypeController::class,'edit'])->name('admin_job_type_edit');
Route::post('/admin/job-type/update/{id}',[AdminJobTypeController::class,'update'])->name('admin_job_type_update');
Route::get('/admin/job-type/delete/{id}',[AdminJobTypeController::class,'delete'])->name('admin_job_type_delete');

// job experience /////////////////////////////////////////////
Route::get('/admin/job-experience/view',[AdminJobExperienceController::class,'index'])->name('admin_job_experience');
Route::get('/admin/job-experience/create',[AdminJobExperienceController::class,'create'])->name('admin_job_experience_create');
Route::post('/admin/job-experience/store',[AdminJobExperienceController::class,'store'])->name('admin_job_experience_store');
Route::get('/admin/job-experience/edit/{id}',[AdminJobExperienceController::class,'edit'])->name('admin_job_experience_edit');
Route::post('/admin/job-experience/update/{id}',[AdminJobExperienceController::class,'update'])->name('admin_job_experience_update');
Route::get('/admin/job-experience/delete/{id}',[AdminJobExperienceController::class,'delete'])->name('admin_job_experience_delete');

// ////////////////// job gender /////////////////////////////////////////////
Route::get('/admin/job-gender/view',[AdminJobGenderController::class,'index'])->name('admin_job_gender');
Route::get('/admin/job-gender/create',[AdminJobGenderController::class,'create'])->name('admin_job_gender_create');
Route::post('/admin/job-gender/store',[AdminJobGenderController::class,'store'])->name('admin_job_gender_store');
Route::get('/admin/job-gender/edit/{id}',[AdminJobGenderController::class,'edit'])->name('admin_job_gender_edit');
Route::post('/admin/job-gender/update/{id}',[AdminJobGenderController::class,'update'])->name('admin_job_gender_update');
Route::get('/admin/job-gender/delete/{id}',[AdminJobGenderController::class,'delete'])->name('admin_job_gender_delete');

// ////////////////// job salary /////////////////////////////////////////////
Route::get('/admin/job-salary/view',[AdminJobSalaryRangeController::class,'index'])->name('admin_job_salary');
Route::get('/admin/job-salary/create',[AdminJobSalaryRangeController::class,'create'])->name('admin_job_salary_create');
Route::post('/admin/job-salary/store',[AdminJobSalaryRangeController::class,'store'])->name('admin_job_salary_store');
Route::get('/admin/job-salary/edit/{id}',[AdminJobSalaryRangeController::class,'edit'])->name('admin_job_salary_edit');
Route::post('/admin/job-salary/update/{id}',[AdminJobSalaryRangeController::class,'update'])->name('admin_job_salary_update');
Route::get('/admin/job-salary/delete/{id}',[AdminJobSalaryRangeController::class,'delete'])->name('admin_job_salary_delete');


// company location /////////////////////////////////////////////
Route::get('/admin/company-location/view',[AdminCompanyLocationController::class,'index'])->name('admin_company_location');
Route::get('/admin/company-location/create',[AdminCompanyLocationController::class,'create'])->name('admin_company_location_create');
Route::post('/admin/company-location/store',[AdminCompanyLocationController::class,'store'])->name('admin_company_location_store');
Route::get('/admin/company-location/edit/{id}',[AdminCompanyLocationController::class,'edit'])->name('admin_company_location_edit');
Route::post('/admin/company-location/update/{id}',[AdminCompanyLocationController::class,'update'])->name('admin_company_location_update');
Route::get('/admin/company-location/delete/{id}',[AdminCompanyLocationController::class,'delete'])->name('admin_company_location_delete');


// company Industry /////////////////////////////////////////////
Route::get('/admin/company-industry/view',[AdminCompanyIndustryController::class,'index'])->name('admin_company_industry');
Route::get('/admin/company-industry/create',[AdminCompanyIndustryController::class,'create'])->name('admin_company_industry_create');
Route::post('/admin/company-industry/store',[AdminCompanyIndustryController::class,'store'])->name('admin_company_industry_store');
Route::get('/admin/company-industry/edit/{id}',[AdminCompanyIndustryController::class,'edit'])->name('admin_company_industry_edit');
Route::post('/admin/company-industry/update/{id}',[AdminCompanyIndustryController::class,'update'])->name('admin_company_industry_update');
Route::get('/admin/company-industry/delete/{id}',[AdminCompanyIndustryController::class,'delete'])->name('admin_company_industry_delete');

// ////////////////////// company Size /////////////////////////////////////////////
Route::get('/admin/company-size/view',[AdminCompanySizeController::class,'index'])->name('admin_company_size');
Route::get('/admin/company-size/create',[AdminCompanySizeController::class,'create'])->name('admin_company_size_create');
Route::post('/admin/company-size/store',[AdminCompanySizeController::class,'store'])->name('admin_company_size_store');
Route::get('/admin/company-size/edit/{id}',[AdminCompanySizeController::class,'edit'])->name('admin_company_size_edit');
Route::post('/admin/company-size/update/{id}',[AdminCompanySizeController::class,'update'])->name('admin_company_size_update');
Route::get('/admin/company-size/delete/{id}',[AdminCompanySizeController::class,'delete'])->name('admin_company_size_delete');



// why choose/////////////////
Route::get('/admin/why-choose/view',[AdminWhyChooseController::class,'index'])->name('admin_why_choose_item');
Route::get('/admin/why-choose/create',[AdminWhyChooseController::class,'create'])->name('admin_why_choose_item_create');
Route::post('/admin/why-choose/store',[AdminWhyChooseController::class,'store'])->name('admin_why_choose_item_store');
Route::get('/admin/why-choose/edit/{id}',[AdminWhyChooseController::class,'edit'])->name('admin_why_choose_item_edit');
Route::post('/admin/why-choose/update/{id}',[AdminWhyChooseController::class,'update'])->name('admin_why_choose_item_update');
Route::get('/admin/why-choose/delete/{id}',[AdminWhyChooseController::class,'delete'])->name('admin_why_choose_item_delete');



// testimonials/////////////////
Route::get('/admin/testimonial/view',[AdminTestimonialController::class,'index'])->name('admin_testimonial');
Route::get('/admin/testimonial/create',[AdminTestimonialController::class,'create'])->name('admin_testimonial_create');
Route::post('/admin/testimonial/store',[AdminTestimonialController::class,'store'])->name('admin_testimonial_store');
Route::get('/admin/testimonial/edit/{id}',[AdminTestimonialController::class,'edit'])->name('admin_testimonial_edit');
Route::post('/admin/testimonial/update/{id}',[AdminTestimonialController::class,'update'])->name('admin_testimonial_update');
Route::get('/admin/testimonial/delete/{id}',[AdminTestimonialController::class,'delete'])->name('admin_testimonial_delete');


// Blog /////////////////
Route::get('/admin/post/view',[AdminPostController::class,'index'])->name('admin_post');
Route::get('/admin/post/create',[AdminPostController::class,'create'])->name('admin_post_create');
Route::post('/admin/post/store',[AdminPostController::class,'store'])->name('admin_post_store');
Route::get('/admin/post/edit/{id}',[AdminPostController::class,'edit'])->name('admin_post_edit');
Route::post('/admin/post/update/{id}',[AdminPostController::class,'update'])->name('admin_post_update');
Route::get('/admin/post/delete/{id}',[AdminPostController::class,'delete'])->name('admin_post_delete');



// FAQ /////////////////
Route::get('/admin/faq/view',[FaqController::class,'index'])->name('admin_faq');
Route::get('/admin/faq/create',[FaqController::class,'create'])->name('admin_faq_create');
Route::post('/admi/faq/store',[FaqController::class,'store'])->name('admin_faq_store');
Route::get('/admin/faq/edit/{id}',[FaqController::class,'edit'])->name('admin_faq_edit');
Route::post('/admin/faq/update/{id}',[FaqController::class,'update'])->name('admin_faq_update');
Route::get('/admin/faq/delete/{id}',[FaqController::class,'delete'])->name('admin_faq_delete');



// package /////////////////
Route::get('/admin/package/view',[AdminPackageController::class,'index'])->name('admin_package');
Route::get('/admin/package/create',[AdminPackageController::class,'create'])->name('admin_package_create');
Route::post('/admin/package/store',[AdminPackageController::class,'store'])->name('admin_package_store');
Route::get('/admin/package/edit/{id}',[AdminPackageController::class,'edit'])->name('admin_package_edit');
Route::post('/admin/package/update/{id}',[AdminPackageController::class,'update'])->name('admin_package_update');
Route::get('/admin/package/delete/{id}',[AdminPackageController::class,'delete'])->name('admin_package_delete');


// settings /////////////////
Route::get('/admin/settings',[AdminSettingController::class,'index'])->name('admin_settings');
Route::post('/admin/settings/update',[AdminSettingController::class,'update'])->name('admin_settings_update');


});






