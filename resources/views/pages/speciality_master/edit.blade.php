
@extends('layouts/contentLayoutMaster')

@section('title', 'Update speciality')

@section('page-style')
        <!-- Page css files -->
        <link rel="stylesheet" href="{{ asset(mix('css/pages/authentication.css')) }}"> 
@endsection
@section('content')
   <link rel="stylesheet" type="text/css" href="/css/website/custom_style.css">
   @if(Auth::user()->email == 'yug.spider@gmail.com')
   <section class="row">
  <div class="col-xl-12 col-11">
      <div class="card bg-authentication rounded-0 mb-0">
          <div class="row m-0">
              <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                  <img src="{{ asset('images/pages/login.png') }}" alt="branding logo">
              </div>
              <div class="col-lg-6 col-12 p-0">
                  <div class="card rounded-0 mb-0 px-2">
                      <div class="card-header pb-1">
                          <div class="card-title">
                              <h4 class="mb-0">Update speciality</h4>
                          </div>
                      </div>

                      <p class="px-2">Welcome {{ Auth::user()->name }}, Update speciality</p>
                      <div class="card-content">
                          <div class="card-body pt-1">
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                            </div>
{{--                             <img src="uploads/{{ Session::get('image-upload') }}"> --}}
                            @endif
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <br>
                            <form method="post" action="{{ route('update_sp', $speciality_edit->id) }}">
                              @csrf
                              <fieldset class="form-label-group form-group position-relative has-icon-left">

                                  <input id="edited_speciality" type="edited_speciality" value="{{ $speciality_edit->Speciality }}" class="form-control" name="edited_speciality" placeholder="Enter the speciality" required autofocus>

                                  <div class="form-control-position">
                                      <i class="feather icon-edit"></i>
                                  </div>
                                  <label for="edited_speciality">Enter the speciality</label>
                              </fieldset>
                              <button value="Add_category" type="submit" class="btn btn-primary  btn-inline">Update</button>
                            </form>
                          </div>
                      </div>
                      <div class="login-footer">
                        <div class="divider">
                        </div>
                        <a href="{{ url('view-sp') }}" value="Add_category" type="submit" class="btn btn-primary float-left btn-inline">See all Specialities</a>
                      </div>
                      <div class="login-footer">
                        <div class="divider">
                        </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

</section>
   @else
      You are not authorized
   @endif
</section>
@endsection


