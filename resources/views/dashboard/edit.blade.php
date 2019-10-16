@extends('layouts.dashboard')

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="/dashboard">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Edit Details</li>
</ol>
@endsection

@section('main')
<div class="card">
    <div class="card-header">{{ __('Edit details') }}</div>

    <div class="card-body">
        <form method="POST" action="{{ route('member.update', $user->id) }}">
            @csrf
            {{ method_field('PUT') }}

            <div class="form-group row">
                <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                <div class="col-md-6">
                    <input id="first_name" type="text"
                        class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name"
                        value="{{ $user->first_name }}" required>

                    @if ($errors->has('first_name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="middle_name" class="col-md-4 col-form-label text-md-right">{{ __('Middle Name') }}</label>

                <div class="col-md-6">
                    <input id="middle_name" type="text"
                        class="form-control{{ $errors->has('middle_name') ? ' is-invalid' : '' }}" name="middle_name"
                        value="{{ $user->middle_name }}" required>

                    @if ($errors->has('middle_name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('middle_name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                <div class="col-md-6">
                    <input id="last_name" type="text"
                        class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name"
                        value="{{ $user->last_name }}" required>

                    @if ($errors->has('last_name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Edit') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
