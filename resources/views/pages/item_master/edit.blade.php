
@extends('layouts/contentLayoutMaster')

@section('title', 'Update Item')

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
                              <h4 class="mb-0">Update Item</h4>
                          </div>
                      </div>

                      <p class="px-2">Welcome {{ Auth::user()->name }}, Update Item</p>
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
                            <form method="post" action="{{ route('update_im', $item_edit->id) }}" enctype="multipart/form-data">
                              @csrf
                              <fieldset class="form-label-group form-group position-relative has-icon-left">

                                  <input id="edited_Item_name" type="edited_Item_name" class="form-control" value="{{ $item_edit->item_name }}" name="edited_Item_name" placeholder="Enter the Item name" autofocus>

                                  <div class="form-control-position">
                                      <i class="feather icon-edit"></i>
                                  </div>
                                  <label for="edited_Item_name">Enter the Item name</label>
                              </fieldset>
                              <fieldset class="form-label-group form-group position-relative has-icon-left">

                                  <input id="edited_Item_price" type="number" class="form-control" value="{{ $item_edit->item_price }}" name="edited_Item_price" placeholder="Enter the Item price" autofocus>

                                  <div class="form-control-position">
                                      <i class="feather icon-edit"></i>
                                  </div>
                                  <label for="edited_Item_price">Enter the Item price</label>
                              </fieldset>
                              <fieldset class="form-label-group form-group position-relative has-icon-left">

                                  <textarea id="edited_Item_description" type="edited_Item_description" class="form-control" name="edited_Item_description" placeholder="Enter the Item description">{{ $item_edit->item_description }}</textarea>

                                  <div class="form-control-position">
                                      <i class="feather icon-edit"></i>
                                  </div>
                                  <label for="edited_Item_description">Enter the Item description</label>
                              </fieldset>
                              <fieldset class="form-group">
                                  <label for="basicInputFile">Choose Theme Image File</label>
                                  <div class="custom-file">
                                      <input type="file" name="edited_image_upload" class="custom-file-input" id="inputGroupFile01">
                                      <label class="custom-file-label" for="inputGroupFile01">Choose Theme Image File</label>
                                  </div>
                              </fieldset> 
                              
                              <button value="Add_Item" type="submit" class="btn btn-primary  btn-inline">Create</button>
                          </div>
                      </div>
                      <div class="login-footer">
                        <div class="divider">
                        </div>
                        <a href="{{ url('view-im') }}" value="Add_Item" type="submit" class="btn btn-primary float-left btn-inline">See all Item</a>
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


