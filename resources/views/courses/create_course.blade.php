@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="display-4">Create Course</h2>
            <hr>
            <form action="/courses/store" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Course Title</label>
                    <div>
                        <input id="course_title" type="text" placeholder="Course Title"
                            value="{{ old('course_title') }}"
                            class="form-control{{ $errors->has('course_title') ? ' is-invalid' : '' }}"
                            name="course_title" value="{{ old('course_title') }}" required>

                        @if ($errors->has('course_title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('course_title') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="title">Upload Course Main Image</label>
                    <input id="course_image" type="file"
                        class="form-control-file{{ $errors->has('course_image') ? ' is-invalid' : '' }}"
                        name="course_image" value="{{ old('course_image') }}" aria-describedby="fileHelp" required>
                    <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of
                        image should not be more than 2MB.</small>

                    @if ($errors->has('course_image'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('course_image') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="title">Course Description</label>
                    <textarea id="course_description" type="text"
                        class="form-control{{ $errors->has('course_description') ? ' is-invalid' : '' }}"
                        name="course_description" value="{{ old('course_description') }}" required></textarea>

                    @if ($errors->has('course_description'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('course_description') }}</strong>
                    </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary" style="min-width:120px">Create</button>
            </form>
        </div>
    </div>
</div>
@endsection
