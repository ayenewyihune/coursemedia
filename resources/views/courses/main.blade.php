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
        @foreach ($courses as $course)
        <div class="col-lg-4 col-sm-6 portfolio-item" id="indexProj2" style="opacity:0;">
            <div class="card h-100">
                <a href="{{ route('course.show', [$course->id, $chapter_number]) }}">
                    <img class="card-img-top" style="height:200px"
                        src="{{asset("storage/courses/course_images/".$course->course_image)}}" alt="course image">
                </a>
                <div class="card-body">
                    <a href="{{ route('course.show', [$course->id, $chapter_number]) }}">
                        <h4 class="card-title display-4" style="font-size: 25px !important">{{ $course->course_title }}
                        </h4>
                    </a>
                    <small>{{ $course->course_description }}</small>
                </div>
                <div class="card-footer" style="padding:2%; color:gray;">
                    <div class="row">
                        <div class="col-6">
                            <small>{{$course->user->first_name}} ({{$course->user->university}})</small>
                        </div>
                        <div class="col-6 text-center">
                            <small>{{$course->likes('course_id', $course->id)->count()}} like(s)</small>
                            <small>{{$course->favorites('course_id', $course->id)->count()}} favor(s)</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- /.row -->

</div>
@endsection
