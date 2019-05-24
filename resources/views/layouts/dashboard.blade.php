@extends('layouts.app')

@section('css')
<link href="{{asset('css/course_sidebar.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    {{-- For large screens --}}
    <div class="d-none d-lg-block">
        <h2 class="mt-4 mb-3 display-4">Account Settings</h2>

        @yield('breadcrumb')
        <div class="row">
            <!-- Sidebar Column -->
            <div class="col-lg-3 mb-4">
                <div class="list-group">
                    <a href="/dashboard" class="list-group-item">Account Details</a>
                    @if(Auth::user()->roles->first()->name=='Teacher')
                    <a href="/dashboard/my-courses" class="list-group-item">My Courses</a>
                    @endif
                    <a href="/dashboard/favorites" class="list-group-item">Favorites</a>
                </div>
            </div>
            <!-- Content Column -->
            <div class="col-lg-9 mb-4">
                @yield('main')
            </div>
        </div>
    </div>

    {{-- For small and medium screens --}}
    <div class="d-lg-none d-xl-none">
        {{-- Navigation toggler button --}}
        <button class="navbar-light navbar-toggler navbar-toggler-right" style="border:1px solid #ccc;margin:15px 15px 0 0;"
            onclick="openNav()">
            <span class="navbar-toggler-icon"></span>
        </button>

        <h2 class="display-4">Account Settings</h2>
        {{-- Side navigation --}}
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="/">Back to Home</a>
            <hr>
            <a href="/dashboard">Account Details</a>
            @if(Auth::user()->roles->first()->name=='Teacher')
            <a href="/dashboard/my-courses">My Courses</a>
            @endif
            <a href="/dashboard/favorites">Favorites</a>
        </div>

        {{-- Main content --}}
        @yield('main')
    </div>
</div>

@endsection

@section('js')
<script src="{{ asset('js/course_sidebar.js') }}"></script>
@endsection
