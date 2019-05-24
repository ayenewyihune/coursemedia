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

            <div class="form-group row">
                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                <div class="col-md-6">
                    <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                        name="phone" value="{{ $user->phone }}" required>

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
                    <select id="university" class="form-control{{ $errors->has('university') ? ' is-invalid' : '' }}"
                        name="university" required>
                        <option></option>
                        <option value="AASTU" @if($user->university=='AASTU') selected='selected' @endif>AASTU</option>
                        <option value="AAU" @if($user->university=='AAU') selected='selected' @endif>AAU</option>
                        <option value="AGU" @if($user->university=='AGU') selected='selected' @endif>AGU</option>
                        <option value="AMU" @if($user->university=='AMU') selected='selected' @endif>AMU</option>
                        <option value="ARU" @if($user->university=='ARU') selected='selected' @endif>ARU</option>
                        <option value="ASTU" @if($user->university=='ASTU') selected='selected' @endif>ASTU</option>
                        <option value="ASU" @if($user->university=='ASU') selected='selected' @endif>ASU</option>
                        <option value="AXU" @if($user->university=='AXU') selected='selected' @endif>AXU</option>
                        <option value="BDU" @if($user->university=='BDU') selected='selected' @endif>BDU</option>
                        <option value="DBU" @if($user->university=='DBU') selected='selected' @endif>DBU</option>
                        <option value="DMU" @if($user->university=='DMU') selected='selected' @endif>DMU</option>
                        <option value="DTU" @if($user->university=='DTU') selected='selected' @endif>DTU</option>
                        <option value="DU" @if($user->university=='DU') selected='selected' @endif>DU</option>
                        <option value="DDU" @if($user->university=='DDU') selected='selected' @endif>DDU</option>
                        <option value="GU" @if($user->university=='GU') selected='selected' @endif>GU</option>
                        <option value="HMU" @if($user->university=='HMU') selected='selected' @endif>HMU</option>
                        <option value="HU" @if($user->university=='HU') selected='selected' @endif>HU</option>
                        <option value="JJU" @if($user->university=='JJU') selected='selected' @endif>JJU</option>
                        <option value="JU" @if($user->university=='JU') selected='selected' @endif>JU</option>
                        <option value="MTU" @if($user->university=='MTU') selected='selected' @endif>MTU</option>
                        <option value="MU" @if($user->university=='MU') selected='selected' @endif>MU</option>
                        <option value="MWU" @if($user->university=='MWU') selected='selected' @endif>MWU</option>
                        <option value="SU" @if($user->university=='SU') selected='selected' @endif>SU</option>
                        <option value="WDU" @if($user->university=='WDU') selected='selected' @endif>WDU</option>
                        <option value="WLU" @if($user->university=='WLU') selected='selected' @endif>WLU</option>
                        <option value="WKU" @if($user->university=='WKU') selected='selected' @endif>WKU</option>
                        <option value="WU" @if($user->university=='WU') selected='selected' @endif>WU</option>
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
                    <select id="department" class="form-control{{ $errors->has('department') ? ' is-invalid' : '' }}"
                        name="department" required>
                        <option></option>
                        <option value="Accounting" @if($user->department=='Accounting') selected='selected'
                            @endif>Accounting</option>
                        <option value="Animal Production" @if($user->department=='Animal Production')
                            selected='selected' @endif>Animal Production</option>
                        <option value="Architecture" @if($user->department=='Architecture') selected='selected'
                            @endif>Architecture</option>
                        <option value="Biology" @if($user->department=='Biology') selected='selected' @endif>Biology
                        </option>
                        <option value="Biomedical Sciences" @if($user->department=='Biomedical Sciences')
                            selected='selected' @endif>Biomedical Sciences</option>
                        <option value="Biotechnology" @if($user->department=='Biotechnology') selected='selected'
                            @endif>Biotechnology</option>
                        <option value="Chemical Engineering" @if($user->department=='Chemical Engineering')
                            selected='selected' @endif>Chemical Engineering</option>
                        <option value="Chemistry" @if($user->department=='Chemistry') selected='selected'
                            @endif>Chemistry</option>
                        <option value="Civil Engineering" @if($user->department=='Civil Engineering')
                            selected='selected' @endif>Civil Engineering</option>
                        <option value="Computer Science" @if($user->department=='Computer Science') selected='selected'
                            @endif>Computer Science</option>
                        <option value="CoTM" @if($user->department=='CoTM') selected='selected' @endif>CoTM</option>
                        <option value="Economics" @if($user->department=='Economics') selected='selected'
                            @endif>Economics</option>
                        <option value="Electrical Engineering" @if($user->department=='Electrical Engineering')
                            selected='selected' @endif>Electrical Engineering</option>
                        <option value="English" @if($user->department=='English') selected='selected' @endif>English
                        </option>
                        <option value="Environmental Engineering" @if($user->department=='Environmental Engineering')
                            selected='selected' @endif>Environmental Engineering</option>
                        <option value="Environmental Sciences" @if($user->department=='Environmental Sciences')
                            selected='selected' @endif>Environmental Sciences</option>
                        <option value="Geography" @if($user->department=='Geography') selected='selected'
                            @endif>Geography</option>
                        <option value="Geology" @if($user->department=='Geology') selected='selected' @endif>Geology
                        </option>
                        <option value="History" @if($user->department=='History') selected='selected' @endif>History
                        </option>
                        <option value="Horticulture" @if($user->department=='Horticulture') selected='selected'
                            @endif>Horticulture</option>
                        <option value="Law" @if($user->department=='Law') selected='selected' @endif>Law</option>
                        <option value="Management" @if($user->department=='Management') selected='selected'
                            @endif>Management</option>
                        <option value="Marketing" @if($user->department=='Marketing') selected='selected'
                            @endif>Marketing</option>
                        <option value="Mathematics" @if($user->department=='Mathematics') selected='selected'
                            @endif>Mathematics</option>
                        <option value="Mechanical Engineering" @if($user->department=='Mechanical Engineering')
                            selected='selected' @endif>Mechanical Engineering</option>
                        <option value="Medicine" @if($user->department=='Medicine') selected='selected' @endif>Medicine
                        </option>
                        <option value="Midwifery" @if($user->department=='Midwifery') selected='selected'
                            @endif>Midwifery</option>
                        <option value="NReM" @if($user->department=='NReM') selected='selected' @endif>NReM</option>
                        <option value="Nursing" @if($user->department=='Nursing') selected='selected' @endif>Nursing
                        </option>
                        <option value="Pharmacy" @if($user->department=='Pharmacy') selected='selected' @endif>Pharmacy
                        </option>
                        <option value="Physics" @if($user->department=='Physics') selected='selected' @endif>Physics
                        </option>
                        <option value="Plant Sciences" @if($user->department=='Plant Sciences') selected='selected'
                            @endif>Plant Sciences</option>
                        <option value="Political Science" @if($user->department=='Political Science')
                            selected='selected' @endif>Political Science</option>
                        <option value="Psychology" @if($user->department=='Psychology') selected='selected'
                            @endif>Psychology</option>
                        <option value="Public Health" @if($user->department=='Public Health') selected='selected'
                            @endif>Public Health</option>
                        <option value="Sociology" @if($user->department=='Sociology') selected='selected'
                            @endif>Sociology</option>
                        <option value="Sport Science" @if($user->department=='Sport Science') selected='selected'
                            @endif>Sport Science</option>
                        <option value="Statistics" @if($user->department=='Statistics') selected='selected'
                            @endif>Statistics</option>
                        <option value="Surgery" @if($user->department=='Surgery') selected='selected' @endif>Surgery
                        </option>
                    </select>

                    @if ($errors->has('department'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('department') }}</strong>
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
