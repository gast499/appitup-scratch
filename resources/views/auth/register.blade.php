@extends('layouts.app')
@section('scripts')
{!!Html::script('js/signup.js') !!}
@endsection

@section('content')
<div class="row intro" id="whoareyou">
    Who are you?
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" id="signupForm" action="{{ route('register') }}">
    @csrf
    <div id="selectType" style="display: block;">
        <div class="form-group row">
            <div class="card card-select left-img" id="data-cardSelect1" data-value="Dreamer" onclick="selectCard('1')">
                <img class="card-img-top signup-img" src="{{asset('assets/images/dreamer.png')}}">
                <div class="card-body">
                    <h5 class="card-title">Dreamer</h5>
                </div>
            </div>
            <div class="card card-select right-img" id="data-cardSelect2" data-value="Creator" onclick="selectCard('2')">
                <img class="card-img-top signup-img" src="{{asset('assets/images/creator.png')}}">
                <div class="card-body">
                    <h5 class="card-title">Creator</h5>
                </div>
            </div>
            <input type="hidden" id="type" name="type" value="">;
        </div>
    </div>
    <div id="emailpassword" style="display: none">
        <div class="form-group row">
            <label for="email"
            class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email"
                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="password"
            class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password"
                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                name="password" required>

                @if ($errors->has('password'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" id="register" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </div>
</form>
@endsection
