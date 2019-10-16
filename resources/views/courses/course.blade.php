@extends('layouts.app')

@section('css')
<link href="{{asset('css/course_sidebar.css') }}" rel="stylesheet">
<style>
    button.like {
        padding-left: 4px;
        padding-right: 4px;
        padding-bottom: 2px;
        padding-top: 2px;
        font-size: 12px;
    }

    form.like {
        margin: 0 4px 0 4px;
    }

    span.like {
        font-size: 12px;
        color: blue;
    }

    .breadcrumb {
        padding: 6px 10px !important;
    }

    .inlined {
        display: inline;
    }

</style>
@endsection

@section('content')
<!-- Page content for small and medium screens -->
<div class="d-lg-none d-xl-none">
    {{-- Side navigation --}}
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        @foreach ($chapters as $chapter)
        <a href="/courses/{{$course->id}}/{{$chapter->chapter_number}}">{{$chapter->chapter_title}}</a>
        @endforeach
        @if(Auth::check())
        @if(Auth::user()->id==$course->user_id)
        <a href="{{route('chapter.create',$course->id)}}" style="background:white;color:cornflowerblue;
        border:1px solid #ccc;margin:5px;">Create Chapter</a>
        @endif
        @endif
    </div>

    {{-- Navigation toggler button --}}
    <button class="navbar-light navbar-toggler navbar-toggler-right" style="border:1px solid #ccc;margin:5px;"
        onclick="openNav()">
        <span class="navbar-toggler-icon"></span> Chapters
    </button>

    <div class="container">
        <h4 class="display-4">{{$course->course_title}}</h4>

        <!-- Page Heading/Breadcrumbs -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                @if(Auth::check())
                @if(Auth::user()->id==$course->user_id)
                <li class="ml-auto"><a href="{{route('course.delete',$course->id)}}"
                        class="btn btn-danger btn-sm">Delete
                        Course</a></li>
                @else
                <form action="{{route('course.delete', $course->id)}}" class="ml-auto like" method="POST">
                    {{ csrf_field() }}
                    <span class="like">15</span>
                    <button type="submit" class="btn btn-sm btn-light like">Add to favorites</button>
                </form>
                <form action="{{route('course.delete', $course->id)}}" class="like" method="POST">
                    {{ csrf_field() }}
                    <span class="like">15</span>
                    <button type="submit" class="btn btn-sm btn-light like">Like</button>
                </form>
                @endif
                @endif
            </ol>
        </nav>

        @if(Auth::check())
        @if(Auth::user()->id==$course->user_id)
        <div class="text-right py-2">
            @if ($current_chapter->chapter_number != 1)
            <a href="{{route('chapter.delete', [$course->id, $current_chapter->chapter_number])}}"
                class="btn btn-sm btn-danger">Delete Chapter</a>
            @endif
            <a href="{{route('chapter.edit', [$course->id, $current_chapter->chapter_number])}}"
                class="btn btn-sm btn-primary">Edit Chapter</a>
        </div>
        @endif
        @endif
        @if ($current_chapter->chapter_number == 1)
        <img class="img-fluid rounded mb-4" style="width:100%; max-height:500px;"
            src="{{asset("storage/courses/course_images/".$course->course_image)}}" alt="course image">
        @endif
        <h2 class="display-4">{{$current_chapter->chapter_title}}</h2>
        <p>{!!$current_chapter->chapter_body!!}</p>
        @if ($current_chapter->chapter_handout != null)
        <p>More on this chapter: <a
                href="{{route('handout.download', [$course->id, $current_chapter->chapter_number])}}"
                style="color:cornflowerblue; text-decoration:underline;">download chapter handout here</a>
        </p>
        @endif
        <br><br>

        {{-- Comments list --}}
        {{-- <legend>Comments</legend>
        <hr>
        <div id="commentList" class="comment-list">
            
        </div> --}}

        {{-- Comment form --}}
        <div class="comment-form py-2">
            <form {{--action="{{ route('chapter_comment.store', $current_chapter->id) }}" method="POST" --}}>
                {{ csrf_field() }}

                <hr>
                <div class="form-group">
                    <textarea id="content" type="text"
                        class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}" name="body"
                        value="{{ old('body') }}" required></textarea>

                    @if ($errors->has('body'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('body') }}</strong>
                    </span>
                    @endif
                </div>
                <button id="postComment" class="btn btn-primary btn-sm">Comment</button>
            </form>
        </div>

    </div>
</div>

<!-- Page Content for large screens -->
<div class="container d-none d-lg-block">
    <h2 class="mt-4 mb-3 display-4">{{$course->course_title}}</h2>

    <!-- Page Heading/Breadcrumbs -->
    <nav aria-label="breadcrumb" class="small-padding">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">{{$course->course_title}}</li>
            @if(Auth::check())
            @if(Auth::user()->id==$course->user_id)
            <form action="{{route('course.delete',$course->id)}}" class="ml-auto" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger btn-sm">Delete Course</button>
            </form>

            @else

            <form action="{{route('favorite.store', $course->id)}}" class="ml-auto like" method="POST">
                {{ csrf_field() }}
                <span class="like">{{$favors_count}}</span>
                <button type="submit" class="btn btn-sm btn-light like">{{$favorite_text}}</button>
            </form>
            <form action="{{route('like.store', $course->id)}}" class="like" method="POST">
                {{ csrf_field() }}
                <span class="like">{{$likes_count}}</span>
                <button type="submit" class="btn btn-primary" type="submit" id="add"><span class="glyphicon glyphicon-plus"></span> {{$like_text}}</button>
                
            </form>
            @endif
            @endif
        </ol>
    </nav>

    <!-- Content Row -->
    <div class="row">
        <!-- Sidebar Column -->
        <div class="col-lg-3 mb-4">
            <div class="list-group">
                @foreach ($chapters as $chapter)
                <a href="/courses/{{$course->id}}/{{$chapter->chapter_number}}"
                    class="list-group-item">{{$chapter->chapter_title}}</a>
                @endforeach
                @if(Auth::check())
                @if(Auth::user()->id==$course->user_id)
                <a href="{{route('chapter.create',$course->id)}}" class="btn btn-primary">Create Chapter</a>
                @endif
                @endif
            </div>
        </div>
        <!-- Content Column -->
        <div class="col-lg-9 mb-4">
            @if(Auth::check())
            @if(Auth::user()->id==$course->user_id)
            <div class="text-right py-2">
                @if ($current_chapter->chapter_number != 1)
                <form action="{{route('chapter.delete',[$course->id, $current_chapter->chapter_number])}}"
                    class="ml-auto inlined" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger btn-sm">Delete Chapter</button>
                </form>
                @endif
                <a href="{{route('chapter.edit', [$course->id, $current_chapter->chapter_number])}}"
                    class="btn btn-sm btn-primary">Edit Chapter</a>
            </div>
            @endif
            @endif
            @if ($current_chapter->chapter_number == 1)
            <img class="img-fluid rounded mb-4" style="width:100%; max-height:500px;"
                src="{{asset("storage/courses/course_images/".$course->course_image)}}" alt="course image">
            @endif
            <h2 class="display-4">{{$current_chapter->chapter_title}}</h2>
            <p>{!!$current_chapter->chapter_body!!}</p>
            @if ($current_chapter->chapter_handout != null)
            <p>More on this chapter: <a
                    href="{{route('handout.download', [$course->id, $current_chapter->chapter_number])}}"
                    style="color:cornflowerblue; text-decoration:underline;">download chapter handout here</a></p>
            @endif
            <br><br>

            {{-- Comments list --}}
            <legend style="margin:0%">Comments</legend>
            <small id="numberOfComments"></small>
            <hr>
            <div id="commentList" class="comment-list">

            </div>

            {{-- Comment form --}}
            <div class="comment-form py-2">
                <form {{--action="{{ route('chapter_comment.store', $current_chapter->id) }}" method="POST" --}}>
                    {{ csrf_field() }}

                    <hr>
                    <div class="form-group">
                        <textarea id="commentBody" type="text"
                            class="form-control{{ $errors->has('commentBody') ? ' is-invalid' : '' }}" name="commentBody"
                            value="{{ old('commentBody') }}" placeholder="Type your comment here"></textarea>

                        @if ($errors->has('commentBody'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('commentBody') }}</strong>
                        </span>
                        @endif
                    </div>
                    <button type="submit" id="submitComment" class="btn btn-primary btn-sm">Comment</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>
@endsection

@section('js')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/course_sidebar.js') }}"></script>
<script>
    $(document).ready(function () {
        // Fetch comments at page load
        var current_chapter_id = {{
                $current_chapter -> id
            }};
        fetch_comments(current_chapter_id);
        // Fetch comments function
        function fetch_comments(id) {

            $.ajax({
                url: "{{ route('comment.show') }}",
                method: 'GET',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function (data) {
                    $("#commentList").html(data.comments);
                    $("#numberOfComments").text('['+data.total_comments+' comment(s)]');
                }
            });
        }

        // Post comments function
        $("#submitComment").click(function (e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: '{{ route('comment.store') }}',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'body': $('#commentBody').val(),
                    id: {{$current_chapter -> id}}
                },
                success: function (data) {
                    $('#commentList').append(data.comment);
                    $("#numberOfComments").text('['+data.total_comments+' comment(s)]');
                },

            });
            $('#commentBody').val('');
        });
    });

</script>
@endsection
