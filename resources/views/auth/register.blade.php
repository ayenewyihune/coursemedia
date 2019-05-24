@extends('layouts.app')

@section('css')
    <style>
        .jumbotron {
            padding: 5px;
        }
    </style>
@endsection

@section('content')
<div class="jumbotron">
    <div class="container">
        <h1 class="display-4">Already member?</h1>
        <p><a class="btn btn-primary" href="/login" role="button">Login here</a></p>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                            <div class="col-md-6">
                                <select id="role" class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}"
                                    name="role" value="{{ old('role') }}" required>
                                    <option></option>
                                    <option value="Student">Student</option>
                                    <option value="Teacher">Teacher</option>
                                </select>

                                @if ($errors->has('role'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('role') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="first_name"
                                class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text"
                                    class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                    name="first_name" value="{{ old('first_name') }}" required>

                                @if ($errors->has('first_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="middle_name"
                                class="col-md-4 col-form-label text-md-right">{{ __('Middle Name') }}</label>

                            <div class="col-md-6">
                                <input id="middle_name" type="text"
                                    class="form-control{{ $errors->has('middle_name') ? ' is-invalid' : '' }}"
                                    name="middle_name" value="{{ old('middle_name') }}" required>

                                @if ($errors->has('middle_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('middle_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name"
                                class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text"
                                    class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                    name="last_name" value="{{ old('last_name') }}" required>

                                @if ($errors->has('last_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                    value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone
                                    Number')
                                    }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text"
                                    class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone"
                                    value="{{ old('phone') }}" required>

                                @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="university" class="col-md-4 col-form-label text-md-right">{{
                                        __('University') }}</label>

                            <div class="col-md-6">
                                <select id="university"
                                    class="form-control{{ $errors->has('university') ? ' is-invalid' : '' }}"
                                    name="university" value="{{ old('university') }}" required>
                                    <option></option>
                                    <option>AASTU</option>
                                    <option>AAU</option>
                                    <option>AGU</option>
                                    <option>AMU</option>
                                    <option>ARU</option>
                                    <option>ASTU</option>
                                    <option>ASU</option>
                                    <option>AXU</option>
                                    <option>BDU</option>
                                    <option>DBU</option>
                                    <option>DMU</option>
                                    <option>DTU</option>
                                    <option>DU</option>
                                    <option>DDU</option>
                                    <option>GU</option>
                                    <option>HMU</option>
                                    <option>HU</option>
                                    <option>JJU</option>
                                    <option>JU</option>
                                    <option>MTU</option>
                                    <option>MU</option>
                                    <option>MWU</option>
                                    <option>SU</option>
                                    <option>WDU</option>
                                    <option>WLU</option>
                                    <option>WKU</option>
                                    <option>WU</option>
                                </select>

                                @if ($errors->has('university'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('university') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="department" class="col-md-4 col-form-label text-md-right">{{
                                    __('Department') }}</label>

                            <div class="col-md-6">
                                <select id="department"
                                    class="form-control{{ $errors->has('department') ? ' is-invalid' : '' }}"
                                    name="department" value="{{ old('department') }}" required>
                                    <option></option>
                                    <option>Accounting</option>
                                    <option>Animal Production</option>
                                    <option>Architecture</option>
                                    <option>Biology</option>
                                    <option>Biomedical Sciences</option>
                                    <option>Biotechnology</option>
                                    <option>Chemical Engineering</option>
                                    <option>Chemistry</option>
                                    <option>Civil Engineering</option>
                                    <option>Computer Science</option>
                                    <option>CoTM</option>
                                    <option>Economics</option>
                                    <option>Electrical Engineering</option>
                                    <option>English</option>
                                    <option>Environmental Engineering</option>
                                    <option>Environmental Sciences</option>
                                    <option>Geography</option>
                                    <option>Geology</option>
                                    <option>History</option>
                                    <option>Horticulture</option>
                                    <option>Law</option>
                                    <option>Management</option>
                                    <option>Marketing</option>
                                    <option>Mathematics</option>
                                    <option>Mechanical Engineering</option>
                                    <option>Medicine</option>
                                    <option>Midwifery</option>
                                    <option>NReM</option>
                                    <option>Nursing</option>
                                    <option>Pharmacy</option>
                                    <option>Physics</option>
                                    <option>Plant Sciences</option>
                                    <option>Political Science</option>
                                    <option>Psychology</option>
                                    <option>Public Health</option>
                                    <option>Sociology</option>
                                    <option>Sport Science</option>
                                    <option>Statistics</option>
                                    <option>Surgery</option>
                                </select>

                                @if ($errors->has('department'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('department') }}</strong>
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
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required>
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
