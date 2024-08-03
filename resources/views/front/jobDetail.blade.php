@extends('front.layouts.app')
@section('main')
<section class="section-4 bg-2">    
  <div class="container pt-5">
      <div class="row">
          <div class="col">
              <nav aria-label="breadcrumb" class=" rounded-3 p-3">
                  <ol class="breadcrumb mb-0">
                      <li class="breadcrumb-item"><a href="{{ route('jobs') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp;Back to Jobs</a></li>
                  </ol>
              </nav>
          </div>
      </div> 
  </div>
  <div class="container job_details_area">
      <div class="row pb-5">
          <div class="col-md-8">
            @include('front.message')
              <div class="card shadow border-0">
                  <div class="job_details_header">
                      <div class="single_jobs white-bg d-flex justify-content-between">
                          <div class="jobs_left d-flex align-items-center">
                              
                              <div class="jobs_conetent">
                                  <a href="#">
                                      <h4>{{ $job->title }}</h4>
                                  </a>
                                  <div class="links_locat d-flex align-items-center">
                                      <div class="location">
                                          <p> <i class="fa fa-map-marker"></i> {{ $job->location }}</p>
                                      </div>
                                      <div class="location">
                                          <p> <i class="fa fa-clock-o"></i> {{ $job->jobType->name }}</p>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="jobs_right">
                              <div class="apply_now">
                                  <a class="heart_mark" href="#"> <i class="fa fa-heart-o" aria-hidden="true"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="descript_wrap white-bg">
                      <div class="single_wrap">
                          <h4>Job description</h4>
                          {!! nl2br($job->description) !!}
                      </div>
                      @if(!empty($job->responsibility))
                      <div class="single_wrap">
                      <h4>Responsibility</h4>
                        {!! nl2br($job->responsibility) !!}
                      </div>
                      @endif
                      @if(!empty($job->qualification))
                      <div class="single_wrap">
                        <h4>Qualifications</h4>
                          {!! nl2br($job->qualification) !!}
                      </div>
                      @endif
                      @if(!empty($job->benefits))
                      <div class="single_wrap">
                        <h4>Benefits</h4>
                          {!! nl2br($job->benefits) !!}
                        </div>
                      @endif
                      <div class="border-bottom"></div>
                      <div class="pt-3 text-end">
                          <a href="#" class="btn btn-secondary">Save</a>
                          @if(Auth::check())
                            <a javascript:void(0); onclick="applyJob({{ $job->id }})" class="btn btn-primary">Apply</a>
                          @else
                            <a href="javascript:void(0);" class="btn btn-primary disabled">Login to Apply</a>
                          @endif
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="card shadow border-0">
                  <div class="job_sumary">
                      <div class="summery_header pb-1 pt-4">
                          <h3>Job Summery</h3>
                      </div>
                      <div class="job_content pt-3">
                          <ul>
                              <li>Published on: <span>{{ \Carbon\Carbon::parse($job->created_at)->format('d M, Y') }}</span></li>
                              <li>Vacancy: <span>{{ $job->vacancy }}</span></li>
                              @if (!empty($job->salary))
                              <li>Salary: <span>{{ $job->salary }}</span></li>
                              @endif
                              <li>Location: <span>{{ $job->location }}</span></li>
                              <li>Job Type: <span> {{ $job->jobType->name }}</span></li>
                          </ul>
                      </div>
                  </div>
              </div>
              <div class="card shadow border-0 my-4">
                  <div class="job_sumary">
                      <div class="summery_header pb-1 pt-4">
                          <h3>Company Details</h3>
                      </div>
                      <div class="job_content pt-3">
                          <ul>
                              <li>Name: <span>{{ $job->company_name }}</span></li>
                              @if (!empty($job->company_location))
                              <li>Salary: <span>{{ $job->company_location }}</span></li>
                              @endif
                              @if (!empty($job->comapny_website))
                              <li>Webite: <span><a href="{{ $job->comapny_website }}">{{ $job->comapny_website }}</a></span></li>
                              @endif
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
@endsection

@section('customJs')
<script type="text/javascript">
  function applyJob(id)
  {
    if(confirm('Are You Sure You Want to Apply on this Job ?')) 
    {
      $.ajax({
        type: "post",
        url: "{{ route('applyJob') }}",
        data: {id:id},
        dataType: "json",
        success: function (response) {
          window.location.href = "{{ url()->current() }}";
        }
      });
    }
  }
</script>
@endsection