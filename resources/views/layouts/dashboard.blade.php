@extends('layouts.app')

@section('css')
<link href="{{asset('css/course_sidebar.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    {{-- For large screens --}}
    <div>
        <h2 class="mt-4 mb-3 display-4">Account Settings</h2>

        @yield('breadcrumb')
        <div class="row">
            <!-- Sidebar Column -->
            <div class="col-lg-3 mb-4">
                <div class="list-group">
                    <a href="/dashboard" class="list-group-item">Account Details</a>
                    <a href="/dashboard/courses" class="list-group-item">Courses</a>
                </div>
            </div>
            <!-- Content Column -->
            <div class="col-lg-9 mb-4">
                @yield('main')
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="{{ asset('js/course_sidebar.js') }}"></script>
@endsection
