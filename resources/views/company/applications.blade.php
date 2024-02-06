@extends('front.layout.app')

{{-- @section('seo_title')  @endsection --}}
{{-- @section('seo_meta_description')  @endsection --}}

@section('main_content')

<div
class="page-top" style="background-image: url('{{ asset('uploads/'.$global_banner_data->banner_company_panel) }}')">
<div class="bg"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Candidate Applications</h2>
        </div>
    </div>
</div>
</div>

<div class="page-content user-panel">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <div class="card">
                      @include('company.sidebar')
                </div>
            </div>

            <div class="col-lg-9 col-md-12">

                <h3 class="mt-5">All Job Posts</h3>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>SL</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Location</th>
                                <th>Is Featured</th>
                                <th>Job Detail</th>
                                <th>Applicants</th>
                            </tr>

                            @foreach ($jobs as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->rJobCategory->name }}</td>
                                    <td>{{ $item->rJobLocation->name }}</td>
                                    <td>
                                        @if ($item->is_featured == 1)
                                           <span class="badge bg-success">Featured</span>
                                        @else
                                           <span class="badge bg-danger">Not Featured</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('job',$item->id) }}" class="btn btn-primary btn-sm text-white"><i class="fas fa-eye"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{ route('company_applicants',$item->id) }}" class="badge bg-primary text-white">Applicants</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
</div>

@endsection




                    {{-- <div class="col-lg-9 col-md-12">
                        <h4>Select Job Title</h4>
                        <form action=""method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <select name="" class="form-control select2">
                                            <option value="">Web Designer</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary btn-sm" value="See Applications">
                                </div>
                            </div>
                        </form>
                    </div> --}}
