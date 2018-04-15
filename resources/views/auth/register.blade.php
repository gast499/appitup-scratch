@extends('layouts.app')
@section('scripts')
    {!!Html::script('js/signup.js') !!}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <h2>Who are you?</h2>
                            </div>
                            <div class="form-group row">
                                <div class="card card-select" id="data-cardSelect1" style="width: 18rem;" data-value="dreamer" onclick="selectCard('1')">
                                    <img class="card-img-top" src="{{asset('assets/images/dreamer.png')}}"
                                         alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Dreamer</h5>
                                    </div>
                                </div>
                                <input type="hidden" id="type" name="type" value="">;
                                <div class="card card-select" id="data-cardSelect2" style="width: 18rem;" data-value="creator" onclick="selectCard('2')">
                                    <img class="card-img-top" src="{{asset('assets/images/creator.png')}}"
                                         alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Creator</h5>
                                    </div>
                                </div>
                            </div>
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
