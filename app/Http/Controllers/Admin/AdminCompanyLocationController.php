<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyLocation;

class AdminCompanyLocationController extends Controller
{
    public function index()
    {
        $company_locations = CompanyLocation::get();
        return view('admin.company_location',compact('company_locations'));
    }

    public function create()
    {
        return view('admin.company_location_create');
    }

    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required',
         ]);

         $obj = new CompanyLocation();
         $obj->name  = $request->name;
         $obj->save();

         return redirect()->route('admin_company_location')->with('success','Data is saved successfully');
    }


    public function edit($id)
    {
         $obj_location_single = CompanyLocation::where('id',$id)->first();
         return view('admin.company_location_edit',compact('obj_location_single'));
    }

    public function update(Request $request, $id)
    {

        $obj = CompanyLocation::where('id',$id)->first();
        $request->validate([
            'name' => 'required',
         ]);

         $obj->name  = $request->name;
         $obj->update();

         return redirect()->route('admin_company_location')->with('success','Data is updated successfully');
    }

    public function delete($id)
    {
        CompanyLocation::where('id',$id)->delete();
        return redirect()->route('admin_company_location')->with('success','Data is deleted successfully');
    }
}
