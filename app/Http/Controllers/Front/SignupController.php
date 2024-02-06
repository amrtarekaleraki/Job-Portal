<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageOtherItem;
use App\Models\Company;
use App\Models\Candidate;
use Hash;
use Auth;
use App\Mail\Websitemail;
use Mail;



class SignupController extends Controller
{
    public function index()
    {

        if(Auth::guard('candidate')->check())
        {
            return redirect()->route('candidate_dashboard');
        }

        if(Auth::guard('company')->check())
        {
            return redirect()->route('company_dashboard');
        }

        $other_page_item = PageOtherItem::where('id',1)->first();
        return view('front.signup',compact('other_page_item'));
    }

    public function company_signup_submit(Request $request)
    {
          $request->validate([
             'company_name' => 'required',
             'person_name' => 'required',
             'username' => 'required|unique:companies',
             'email' => 'required|email|unique:companies',
             'password' => 'required',
             'retype_password' => 'required|same:password',
          ]);

          $token = hash('sha256',time());

          $obj = new Company();

          $obj->company_name  = $request->company_name;
          $obj->person_name  = $request->person_name;
          $obj->username  = $request->username;
          $obj->email  = $request->email;
          $obj->password  = Hash::make($request->password);
          $obj->token  = $token;
          $obj->status  = 0;
          $obj->save();

            $verify_link = url('company_signup_verify/'.$token.'/'.$request->email);
            $subject = 'company sign up verification';
            $message = 'Please click on the following link: <br>';
            $message .= '<a href="'.$verify_link.'">Click here</a>';

            Mail::to($request->email)->send(new Websitemail($subject,$message));

          return redirect()->route('login')->with('success','Check your email to verify your sign up.');
    }


    public function company_signup_verify($token,$email)
    {
        $company_data = Company::where('token',$token)->where('email',$email)->first();
        if(!$company_data) {
            return redirect()->route('login');
        }

        $company_data->token = '';
        $company_data->status = 1;
        $company_data->update();

        return redirect()->route('login')->with('success','your email is verified successfully you can login as company now.');

    }


    // candidate signup /////////////////////////////////


    public function candidate_signup_submit(Request $request)
    {
          $request->validate([
             'name' => 'required',
             'username' => 'required|unique:candidates',
             'email' => 'required|email|unique:candidates',
             'password' => 'required',
             'retype_password' => 'required|same:password',
          ]);

          $token = hash('sha256',time());

          $obj = new Candidate();

          $obj->name  = $request->name;
          $obj->username  = $request->username;
          $obj->email  = $request->email;
          $obj->password  = Hash::make($request->password);
          $obj->token  = $token;
          $obj->status  = 0;
          $obj->save();

            $verify_link = url('candidate_signup_verify/'.$token.'/'.$request->email);
            $subject = 'candidate sign up verification';
            $message = 'Please click on the following link: <br>';
            $message .= '<a href="'.$verify_link.'">Click here</a>';

            Mail::to($request->email)->send(new Websitemail($subject,$message));

          return redirect()->route('login')->with('success','Check your email to verify your sign up.');
    }


    public function candidate_signup_verify($token,$email)
    {
        $candidate_data = Candidate::where('token',$token)->where('email',$email)->first();
        if(!$candidate_data) {
            return redirect()->route('login');
        }

        $candidate_data->token = '';
        $candidate_data->status = 1;
        $candidate_data->update();

        return redirect()->route('login')->with('success','your email is verified successfully you can login as candidate now.');

    }


}
