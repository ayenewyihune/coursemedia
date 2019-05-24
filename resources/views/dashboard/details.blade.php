@extends('layouts.dashboard')

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="/dashboard">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Account Details</li>
</ol>
@endsection

@section('main')
<div class="card">
    <div class="card-header">{{ __('Account Details') }}</div>

    <div class="card-body">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td>Role:</td>
                    <td style="color:green">{{$user->roles->first()->name}}</td>
                </tr>
                <tr>
                    <td>First Name:</td>
                    <td style="color:green">{{$user->first_name}}</td>
                </tr>
                <tr>
                    <td>Middle Name:</td>
                    <td style="color:green">{{$user->middle_name}}</td>
                </tr>
                <tr>
                    <td>Last Name:</td>
                    <td style="color:green">{{$user->last_name}}</td>
                </tr>
                <tr>
                    <td>Email Address:</td>
                    <td style="color:green">{{$user->email}}</td>
                </tr>
                <tr>
                    <td>Phone Number:</td>
                    <td style="color:green">{{$user->phone}}</td>
                </tr>
                <tr>
                    <td>University:</td>
                    <td style="color:green">{{$user->university}}</td>
                </tr>
                <tr>
                    <td>Department:</td>
                    <td style="color:green">{{$user->department}}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('member.edit', $user->id) }}" class="btn btn-secondary">Edit details</a>
    </div>
</div>
@endsection
