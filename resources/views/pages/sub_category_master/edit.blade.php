
@extends('layouts/contentLayoutMaster')

@section('title', 'Update Sub Category')

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
                              <h4 class="mb-0">Update Sub Category</h4>
                          </div>
                      </div>

                      <p class="px-2">Welcome {{ Auth::user()->name }}, Update Sub Category</p>
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
                            <form method="post" action="{{ route('update_sc', $subcategory_edit->id) }}">
                              @csrf
                              <fieldset class="form-label-group form-group position-relative has-icon-left">

                                     <select name="edited_category" id="category" class="custom-select" required>
                                          <option selected value="{{ $subcategory_edit->MainCategory }}">{{ $subcategory_edit->MainCategory }}</option>
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

                                  <input id="edited_Sub Category" type="edited_Sub Category" value="{{ $subcategory_edit->SubCategory }}" class="form-control" name="edited_SubCategory" placeholder="Enter the Sub Category" required autofocus>

                                  <div class="form-control-position">
                                      <i class="feather icon-edit"></i>
                                  </div>
                                  <label for="edited_Sub Category">Enter the Sub Category</label>
                              </fieldset>
                              <button value="Add_Sub category" type="submit" class="btn btn-primary  btn-inline">Update</button>
                            </form>
                          </div>
                      </div>
                      <div class="login-footer">
                        <div class="divider">
                        </div>
                        <a href="{{ url('view-sc') }}" value="Add_Sub category" type="submit" class="btn btn-primary float-left btn-inline">See all Sub Category</a>
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


