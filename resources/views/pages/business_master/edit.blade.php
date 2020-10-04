@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Business')

@section('page-style')
        <link rel="stylesheet" href="{{ asset(mix('css/pages/authentication.css')) }}"> 
@endsection
@section('content')
   <link rel="stylesheet" type="text/css" href="/css/website/custom_style.css">
   @if(Auth::user()->email == 'yug.spider@gmail.com')

   <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
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
                    <form method="POST" action="{{ route('update_b', $speciality->id) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="edited_bn" class="col-md-4 col-form-label text-md-right">{{ __('Business Name') }}</label>

                            <div class="col-md-6">
                                <input id="edited_bn" value="{{ $speciality->Business_name }}" type="text" class="form-control @error('business number') is-invalid @enderror" name="edited_bn" required autocomplete="edited_bn" autofocus>

                                @error('edited_bn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="edited_mn" class="col-md-4 col-form-label text-md-right">{{ __('Mobile Number') }}</label>

                            <div class="col-md-6">
                                <input id="edited_mn" value="{{ $speciality->mobile_number }}" min="1000000000" max="10000000000" type="number" class="form-control @error('Mobile number') is-invalid @enderror" name="edited_mn" required autocomplete="edited_mn" autofocus>

                                @error('edited_mn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="edited_name" class="col-md-4 col-form-label text-md-right">{{ __('Contact Person') }}</label>

                            <div class="col-md-6">
                                <input id="edited_name" value="{{ $speciality->name }}"  type="text" class="form-control @error('edited_name') is-invalid @enderror" name="edited_name" required autocomplete="edited_name" autofocus>

                                @error('edited_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="edit_ut" class="col-md-4 col-form-label text-md-right">{{ __('User Type') }}</label>

                            <div class="col-md-6">
                               <select name="edit_ut" id="edit_ut" class="custom-select" required>
                                    <option value="{{ $speciality->user_type }}">{{$speciality->user_type}}</option>
                                    <option value="Buyer">Buyer</option>
                                    <option value="Seller">Seller</option>
                                    <option value="Buyer and Seller">Buyer and Seller</option>
                                </select>

                                @error('edit_ut')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="edited_email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="edited_email" value="{{ $speciality->email }}" type="edited_email" class="form-control @error('edited_email') is-invalid @enderror" name="edited_email" required autocomplete="edited_email">

                                @error('edited_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="edited_adre" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="edited_adre" value="{{ $speciality->Address }}" type="text" class="form-control @error('address') is-invalid @enderror" name="edited_adre" required autocomplete="edited_adre" autofocus>

                                @error('edited_adre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="edited_city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <input id="edited_city" value="{{ $speciality->City }}" type="text" class="form-control @error('edited_city') is-invalid @enderror" name="edited_city" required autocomplete="edited_city" autofocus>

                                @error('edited_city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="edited_state" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>

                            <div class="col-md-6">
                                <input id="edited_state" value="{{ $speciality->state }}" type="text" class="form-control @error('edited_state') is-invalid @enderror" name="edited_state" required autocomplete="edited_state" autofocus>

                                @error('edited_state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <center><h6>Minimum 1 speciality required.</h6></center>
                        <div class="form-group row">
                            <label for="bs" class="col-md-4 col-form-label text-md-right">{{ __('Business Speciality') }}</label>

                            <div class="col-md-6">
                                <input id="edited_bs1" type="text" class="form-control @error('edited_bs1') is-invalid @enderror" name="edited_bs1" value="{{ $speciality_one }}" required autocomplete="edited_bs1" autofocus>
                                @error('edited_bs1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input id="edited_bs2" type="text" class="form-control @error('edited_bs2') is-invalid @enderror" name="edited_bs2" value="{{ $speciality_two }}" autocomplete="edited_bs2" autofocus>
                                @error('edited_bs2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input id="edited_bs3" type="text" class="form-control @error('edited_bs3') is-invalid @enderror" name="edited_bs3" value="{{ $speciality_three }}" autocomplete="edited_bs3" autofocus>
                                @error('edited_bs3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <center><h6>Minimum 1 Keyword required.</h6></center>
                        <div class="form-group row">
                            <label for="bk" class="col-md-4 col-form-label text-md-right">{{ __('Business Keywords') }}</label>

                            <div class="col-md-6">
                                <input id="edited_bk1" type="text" class="form-control @error('edited_bk1') is-invalid @enderror" name="edited_bk1" value="{{ $keyword_one }}" required autocomplete="edited_bk1" autofocus>

                                @error('edited_bk1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input id="edited_bk2" type="text" class="form-control @error('edited_bk2') is-invalid @enderror" name="edited_bk2" value="{{ $keyword_two }}" autocomplete="edited_bk2" autofocus>

                                @error('edited_bk2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input id="edited_bk3" type="text" class="form-control @error('edited_bk3') is-invalid @enderror" name="edited_bk3" value="{{ $keyword_three }}" autocomplete="edited_bk3" autofocus>

                                @error('edited_bk3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input id="edited_bk4" type="text" class="form-control @error('edited_bk4') is-invalid @enderror" name="edited_bk4" value="{{ $keyword_four }}" autocomplete="edited_bk4" autofocus>

                                @error('edited_bk4')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input id="edited_bk5" type="text" class="form-control @error('edited_bk5') is-invalid @enderror" name="edited_bk5" value="{{ $keyword_five }}" autocomplete="edited_bk5" autofocus>

                                @error('edited_bk5')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                         <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                {{ __('Update your Profile') }}
                                </button>
                            </div>
                        </div>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>

   @else
      You are not authorized
   @endif
</section>
@endsection


