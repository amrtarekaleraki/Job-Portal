@extends('front.layout.app')

{{-- @section('seo_title')  @endsection --}}
{{-- @section('seo_meta_description')  @endsection --}}

@section('main_content')

<div
class="page-top" style="background-image: url('{{ asset('uploads/'.$global_banner_data->banner_candidate_panel) }}')">
<div class="bg"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Bookmarked Jobs</h2>
        </div>
    </div>
</div>
</div>

<div class="page-content user-panel">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <div class="card">
                      @include('candidate.sidebar')
                </div>
            </div>
                <div class="col-lg-9 col-md-12">
                    @if (!$bookmarked_jobs->count())
                        <div class="text-danger">No Data Found</div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>SL</th>
                                        <th>Job Title</th>
                                        <th class="w-100">Detail</th>
                                    </tr>

                                    @foreach ($bookmarked_jobs as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->rJob->title }}</td>
                                            <td>
                                                <a href="{{ route('job',$item->job_id) }}" class="btn btn-primary btn-sm text-white"><i class="fas fa-eye"></i></a>
                                                <a href="{{ route('candidate_bookmark_delete',$item->id) }}" class="btn btn-danger btn-sm text-white" onClick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
        </div>
    </div>
</div>

@endsection


