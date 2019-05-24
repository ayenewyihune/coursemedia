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
@foreach ($favorites as $favorite)
<div class="col-lg-4 col-sm-6 portfolio-item" id="indexProj2" style="opacity:0;">
    <div class="card h-100">
        <a href="{{ route('course.show', [$favorite->course->id, $chapter_number]) }}">
            <img class="card-img-top" style="height:150px"
                src="{{asset("storage/courses/course_images/".$favorite->course->course_image)}}" alt="course image">
        </a>
        <div class="card-body">
            <a href="{{ route('course.show', [$favorite->course->id, $chapter_number]) }}">
                <h4 class="card-title display-4" style="font-size: 25px !important">{{ $favorite->course->course_title }}
                </h4>
            </a>
            <small>{{ $favorite->course->course_description }}</small>
        </div>
        <div class="card-footer" style="padding:2%; color:gray;">
            <div class="row">
                <div class="col-6">
                    <small>{{$favorite->course->user->first_name}} ({{$favorite->user->university}})</small>
                </div>
                <div class="col-6 text-center">
                    <small>{{$favorite->course->likes('course_id', $favorite->course->id)->count()}} like(s)</small>
                    <small>{{$favorite->course->favorites('course_id', $favorite->course->id)->count()}} favor(s)</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
