@extends('front.layouts.app')
@section('main')
<section class="section-5 bg-2">
  <div class="container py-5">
      <div class="row">
          <div class="col">
              <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                  <ol class="breadcrumb mb-0">
                      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                      <li class="breadcrumb-item"><a href="{{ route('admin.jobs') }}">Jobs</a></li>
                      <li class="breadcrumb-item active">Edit</li>
                  </ol>
              </nav>
          </div>
      </div>
      <div class="row">
          <div class="col-lg-3">
              @include('admin.sidebar');
          </div>
          <div class="col-lg-9">
            @include('front.message')
              <form action="" method="post" id="editJobForm" name="editJobForm">
                <div class="card border-0 shadow mb-4 ">
                    <div class="card-body card-form p-4">
                        <h3 class="fs-4 mb-1">Edit Job Details</h3>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="" class="mb-2">Title<span class="req">*</span></label>
                                <input value="{{ $job->title }}" type="text" placeholder="Job Title" id="title" name="title" class="form-control">
                                <p></p>
                            </div>
                            <div class="col-md-6  mb-4">
                                <label for="" class="mb-2">Category<span class="req">*</span></label>
                                <select name="category" id="category" class="form-control">
                                    <option value="">Select a Category</option>
                                    @if ($categories->isNotEmpty())
                                    @foreach ($categories as $category)
                                    <option {{ ($job->category_id == $category->id) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                <p></p>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="" class="mb-2">Job Type<span class="req">*</span></label>
                                <select name="jobType" id="jobType" class="form-select">
                                    <option value="">Select Job Type</option>
                                    @if($jobTypes->isNotEmpty())
                                        @foreach($jobTypes as $jobType)
                                            <option {{ ($job->job_type_id == $jobType->id) ? 'selected' : '' }} value="{{ $jobType->id }}">{{ $jobType->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <p></p>
                            </div>
                            <div class="col-md-6  mb-4">
                                <label for="" class="mb-2">Vacancy<span class="req">*</span></label>
                                <input value="{{ $job->vacancy }}" type="number" min="1" placeholder="Vacancy" id="vacancy" name="vacancy" class="form-control">
                                <p></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-4 col-md-6">
                                <label for="" class="mb-2">Salary</label>
                                <input value="{{ $job->salary }}" type="text" placeholder="Salary" id="salary" name="salary" class="form-control">
                            </div>

                            <div class="mb-4 col-md-6">
                                <label for="" class="mb-2">Location<span class="req">*</span></label>
                                <input value="{{ $job->location }}" type="text" placeholder="location" id="location" name="location" class="form-control">
                                <p></p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                 <div class="form-check">
                                     <input {{ ($job->isFeatured == 1) ? 'checked' : '' }} type="checkbox" class="form-check-input" value="1" id="isFeatured" name="isFeatured">
                                     <label class="form-check-label" for="isFeatured">Featured</label>
                                 </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="form-check-inline">
                                     <input {{ ($job->status == 1) ? 'checked' : '' }} type="radio" class="form-check-input" value="1" id="status-active" name="status">
                                     <label class="form-check-label" for="status-active">Active</label>
                                 </div>
                                 <div class="form-check-inline">
                                     <input {{ ($job->status == 0) ? 'checked' : '' }} type="radio" class="form-check-input" value="0" id="status-block" name="status">
                                     <label class="form-check-label" for="status-block">Block</label>
                                 </div>
                            </div>
                         </div>

                        <div class="mb-4">
                            <label for="" class="mb-2">Description<span class="req">*</span></label>
                            <textarea class="textarea" name="description" id="description" cols="5" rows="5" placeholder="Description">{{ $job->description }}</textarea>
                            <p></p>
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Benefits</label>
                            <textarea class="textarea" name="benefits" id="benefits" cols="5" rows="5" placeholder="Benefits">{{ $job->benefits }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Responsibility</label>
                            <textarea class="textarea" name="responsibility" id="responsibility" cols="5" rows="5" placeholder="Responsibility">{{ $job->responsibility }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Qualifications</label>
                            <textarea class="textarea" name="qualifications" id="qualifications" cols="5" rows="5" placeholder="Qualifications">{{ $job->qualification }}</textarea>
                        </div>
                        
                        <div class="mb-4">
                            <label for="" class="mb-2">Experience<span class="req">*</span></label>
                            <select name="experience" id="experience" class="form-control">
                                <option value="">Select Experience</option>
                                <option {{ ($job->experience == 1) ? 'selected' : '' }} value="1">1 Year</option>
                                <option {{ ($job->experience == 2) ? 'selected' : '' }} value="3">3 Years</option>
                                <option {{ ($job->experience == 3) ? 'selected' : '' }} value="2">2 Years</option>
                                <option {{ ($job->experience == 4) ? 'selected' : '' }} value="4">4 Years</option>
                                <option {{ ($job->experience == 5) ? 'selected' : '' }} value="5">5 Years</option>
                                <option {{ ($job->experience == 6) ? 'selected' : '' }} value="6">6 Years</option>
                                <option {{ ($job->experience == 7) ? 'selected' : '' }} value="7">7 Years</option>
                                <option {{ ($job->experience == 8) ? 'selected' : '' }} value="8">8 Years</option>
                                <option {{ ($job->experience == 9) ? 'selected' : '' }} value="9">9 Years</option>
                                <option {{ ($job->experience == 10) ? 'selected' : '' }} value="10">10 Years</option>
                                <option {{ ($job->experience == '10_plus') ? 'selected' : '' }} value="10_plus">10+ Years</option>
                            </select>
                            <p></p>
                        </div>

                        <div class="mb-4">
                            <label for="" class="mb-2">Keywords</label>
                            <input value="{{ $job->keywords }}" type="text" placeholder="keywords" id="keywords" name="keywords" class="form-control">
                        </div>

                        <h3 class="fs-4 mb-1 mt-5 border-top pt-5">Company Details</h3>

                        <div class="row">
                            <div class="mb-4 col-md-6">
                                <label for="" class="mb-2">Name<span class="req">*</span></label>
                                <input value="{{ $job->company_name }}" type="text" placeholder="Company Name" id="company_name" name="company_name" class="form-control">
                                <p></p>
                            </div>

                            <div class="mb-4 col-md-6">
                                <label for="" class="mb-2">Location</label>
                                <input value="{{ $job->comapny_location }}" type="text" placeholder="Location" id="company_location" name="company_location" class="form-control">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Website</label>
                            <input value="{{ $job->comapny_website }}" type="text" placeholder="Website" id="website" name="website" class="form-control">
                        </div>
                    </div> 
                    <div class="card-footer  p-4">
                        <button type="submit" class="btn btn-primary">Update Job</button>
                    </div>
                </div> 
            </form>             
          </div>
      </div>
  </div>
</section>
@endsection

@section('customJs')
<script type="text/javascript">

$("#editJobForm").submit(function(e){
      e.preventDefault();
      $("button[type='submit']").prop('disabled', true);
      $.ajax({
        url: '{{ route("admin.jobs.update",$job->id) }}',
        type: 'PUT',
        data: $("#editJobForm").serializeArray(),
        dataType: 'json',
        success: function(response){
          $("button[type='submit']").prop('disabled', false);
          if(response.status == true) 
          {
            $('#title').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
            $('#category').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
            $('#jobType').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
            $('#vacancy').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
            $('#location').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
            $('#description').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
            $('#experience').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
            $('#company_name').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
            window.location.href='{{ route("admin.jobs") }}';
          } 
          else 
          {
            var errors = response.errors;
            if(errors.title) {
                    $('#title').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.title);
                }
                else {
                    $('#title').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                }
                if(errors.category) {
                    $('#category').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.category);
                }
                else {
                    $('#category').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                }
                if(errors.jobType) {
                    $('#jobType').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.jobType);
                }
                else {
                    $('#jobType').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                }
                if(errors.vacancy) {
                    $('#vacancy').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.vacancy);
                }
                else {
                    $('#vacancy').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                }
                if(errors.location) {
                    $('#location').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.location);
                }
                else {
                    $('#location').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                }
                if(errors.experience) {
                    $('#experience').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.experience);
                }
                else {
                    $('#experience').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                }
                if(errors.description) {
                    $('#description').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.description);
                }
                else {
                    $('#description').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                }
                if(errors.company_name) {
                    $('#company_name').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.company_name);
                }
                else {
                    $('#company_name').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                }
          }
        },
        error: function(xhr, status, error) {
            console.error("AJAX error:", status, error);
            alert("An error occurred while submitting the form. Please try again.");
        }
      });
    });


    function deleteUser(id)
    {
        if(confirm("Are you sure you want to delete ?"))
        {
         $.ajax({
            type: "delete",
            url: "{{ route('admin.users.destroy') }}",
            data: {id:id},
            dataType: "json",
            success: function (response) {
                window.location.href = "{{ route('admin.users') }}"
            }
         });   
        }
    }
</script>
@endsection