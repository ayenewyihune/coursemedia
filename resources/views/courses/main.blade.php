@extends('layouts.app')

@section('welcome')
<div class="jumbotron text-center" style="padding:0%;margin:0%;">
    @guest
    <p style="color:gray; padding:0%;margin:0%;">Please login to view couses</p>
    @else
    <p style="color:gray;padding:0%;margin:0%;">Hello {{ Auth::user()->first_name }}</p>
    @endguest
</div>
@endsection

@section('content')
{{-- Page Content --}}
<div class="container py-1">

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-8 offset-md-2">
            <br><br><br><br>
            <div class="jumbotron p-3">
                <div class="container">
                    <h2 class="display-4 text-center mb-4">Welcome to Coursemedia, an online platform to share
                        courses.</h2>
                    <div class="text-center">
                        <a class="btn btn-primary mr-2" href="/login" role="button">Login here</a>
                        <a class="btn btn-primary" href="/register" role="button">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>
@endsection
