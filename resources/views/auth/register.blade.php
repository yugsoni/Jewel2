@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="/css/website/custom_style.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="bn" class="col-md-4 col-form-label text-md-right">{{ __('Business Name') }}</label>

                            <div class="col-md-6">
                                <input id="bn" type="text" class="form-control @error('business number') is-invalid @enderror" name="bn" value="{{ old('bn') }}" required autocomplete="bn" autofocus>

                                @error('bn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mn" class="col-md-4 col-form-label text-md-right">{{ __('Mobile Number') }}</label>

                            <div class="col-md-6">
                                <input id="mn" min="1000000000" max="10000000000" type="number" class="form-control @error('Mobile number') is-invalid @enderror" name="mn" value="{{ old('mn') }}" required autocomplete="mn" autofocus>

                                @error('mn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Contact Person') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ut" class="col-md-4 col-form-label text-md-right">{{ __('User Type') }}</label>

                            <div class="col-md-6">
                               <select name="ut" id="ut" class="custom-select" required>
                                    <option value="">Select A User Type</option>
                                    <option value="Buyer">Buyer</option>
                                    <option value="Seller">Seller</option>
                                    <option value="Buyer and Seller">Buyer and Seller</option>
                                </select>

                                @error('ut')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="adre" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="adre" type="text" class="form-control @error('address') is-invalid @enderror" name="adre" value="{{ old('adre') }}" required autocomplete="adre" autofocus>

                                @error('adre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>

                            <div class="col-md-6">
                                <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ old('state') }}" required autocomplete="state" autofocus>

                                @error('state')
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
                                <input id="bs1" type="text" class="form-control @error('bs1') is-invalid @enderror" name="bs1" value="{{ old('Business Speciality 1') }}" required autocomplete="bs1" autofocus>
                                @error('bs1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input id="bs2" type="text" class="form-control @error('bs2') is-invalid @enderror" name="bs2" value="{{ old('Business Speciality 2') }}" autocomplete="bs2" autofocus>
                                @error('bs2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input id="bs3" type="text" class="form-control @error('bs3') is-invalid @enderror" name="bs3" value="{{ old('Business Speciality 3') }}" autocomplete="bs3" autofocus>
                                @error('bs3')
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
                                <input id="bk1" type="text" class="form-control @error('bk1') is-invalid @enderror" name="bk1" value="{{ old('Business Keywords 1') }}" required autocomplete="bk1" autofocus>

                                @error('bk1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input id="bk2" type="text" class="form-control @error('bk2') is-invalid @enderror" name="bk2" value="{{ old('Business Keywords 2') }}" autocomplete="bk2" autofocus>

                                @error('bk2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input id="bk3" type="text" class="form-control @error('bk3') is-invalid @enderror" name="bk3" value="{{ old('Business Keywords 3') }}" autocomplete="bk3" autofocus>

                                @error('bk3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input id="bk4" type="text" class="form-control @error('bk4') is-invalid @enderror" name="bk4" value="{{ old('Business Keywords 4') }}" autocomplete="bk4" autofocus>

                                @error('bk4')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input id="bk5" type="text" class="form-control @error('bk5') is-invalid @enderror" name="bk5" value="{{ old('Business Keywords 5') }}" autocomplete="bk5" autofocus>

                                @error('bk5')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
