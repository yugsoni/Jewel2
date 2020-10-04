
@extends('layouts/contentLayoutMaster')

@section('title', 'Add A Sub Category')

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
                              <h4 class="mb-0">Add a Sub Category</h4>
                          </div>
                      </div>

                      <p class="px-2">Welcome {{ Auth::user()->name }}, add a Sub Category </p>
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
                            <form method="post" action="{{ route('add_SubCategory') }}">
                              @csrf
                              <fieldset class="form-label-group form-group position-relative has-icon-left">

                                     <select name="category" id="category" class="custom-select" required>
                                          <option value="">Select A Main Category</option>
                                          @foreach($main_ca as $main)
                                          <option value="{{ $main->Category }}">{{ $main->Category }}</option>
                                          @endforeach
                                      </select>

                                      @error('category')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror

                                  <label for="Sub Category">Enter the Keyword</label>
                              </fieldset>
                              <fieldset class="form-label-group form-group position-relative has-icon-left">

                                  <input id="Sub_Category" type="Sub_Category" class="form-control" name="Sub_Category" placeholder="Enter the Sub_Category" required autofocus>

                                  <div class="form-control-position">
                                      <i class="feather icon-edit"></i>
                                  </div>
                                  <label for="Sub_Category">Enter the Sub Category</label>
                              </fieldset>
                              
                              <button value="Add_Sub Category" type="submit" class="btn btn-primary  btn-inline">Create</button>
                            </form>
                          </div>
                      </div>
                      <div class="login-footer">
                        <div class="divider">
                        </div>
                        <a href="{{ url('view-sc') }}" value="Add_Sub Category" type="submit" class="btn btn-primary float-left btn-inline">See all Sub Category</a>
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


