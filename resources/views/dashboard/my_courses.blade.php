@extends('layouts.dashboard')

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="/dashboard">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Favorites</li>
</ol>
@endsection

@section('main')
<!-- Content Row -->
<div class="row">
    @foreach ($courses as $course)
    <div class="col-lg-4 col-sm-6 portfolio-item" id="indexProj2" style="opacity:0;">
        <div class="card h-100">
            <a href="{{ route('course.show', [$course->id, $chapter_number]) }}">
                <img class="card-img-top" style="height:150px"
                    src="{{asset("storage/courses/course_images/".$course->course_image)}}" alt="course image">
            </a>
            <div class="card-body">
                <a href="{{ route('course.show', [$course->id, $chapter_number]) }}">
                    <h4 class="card-title display-4" style="font-size: 25px !important">{{ $course->course_title }}
                    </h4>
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
