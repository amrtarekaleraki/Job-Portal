<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobExperience;

class AdminJobExperienceController extends Controller
{
    public function index()
    {
        $job_experiences = JobExperience::get();
        return view('admin.job_experience',compact('job_experiences'));
    }

    public function create()
    {
        return view('admin.job_experience_create');
    }

    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required',
         ]);

         $obj = new JobExperience();
         $obj->name  = $request->name;
         $obj->save();

         return redirect()->route('admin_job_experience')->with('success','Data is saved successfully');
    }


    public function edit($id)
    {
         $obj_experience_single = JobExperience::where('id',$id)->first();
         return view('admin.job_experience_edit',compact('obj_experience_single'));
    }

    public function update(Request $request, $id)
    {

        $obj = JobExperience::where('id',$id)->first();
        $request->validate([
            'name' => 'required',
         ]);

         $obj->name  = $request->name;
         $obj->update();

         return redirect()->route('admin_job_experience')->with('success','Data is updated successfully');
    }

    public function delete($id)
    {
        JobExperience::where('id',$id)->delete();
        return redirect()->route('admin_job_experience')->with('success','Data is deleted successfully');
    }
}
