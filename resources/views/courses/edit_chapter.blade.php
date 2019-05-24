@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="display-4">Edit Chapter</h2>
            <hr>
            <form action="{{ route('chapter.update', [$chapter->course_id, $chapter->chapter_number]) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group">
                    <label for="title">Chapter Number</label>
                    <div>
                        <input id="chapter_number" type="text" placeholder="Chapter Number"
                            value="{{$chapter->chapter_number}}"
                            class="form-control{{ $errors->has('chapter_number') ? ' is-invalid' : '' }}"
                            name="chapter_number" required>

                        @if ($errors->has('chapter_number'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('chapter_number') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="title">Chapter Title</label>
                    <div>
                        <input id="chapter_title" type="text" placeholder="Chapter Title"
                            class="form-control{{ $errors->has('chapter_title') ? ' is-invalid' : '' }}"
                            name="chapter_title" value="{{$chapter->chapter_title}}" required>

                        @if ($errors->has('chapter_title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('chapter_title') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="chapter_body">Chapter Body</label>
                    <textarea id="content" type="text"
                        class="form-control{{ $errors->has('chapter_body') ? ' is-invalid' : '' }}" name="chapter_body"
                        required>{{$chapter->chapter_body}}</textarea>

                    @if ($errors->has('chapter_body'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('chapter_body') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="title">Upload Chapter Handout</label>
                    <input id="chapter_handout" type="file"
                        class="form-control-file{{ $errors->has('chapter_handout') ? ' is-invalid' : '' }}"
                        name="chapter_handout" value="{{$chapter->chapter_handout}}" aria-describedby="fileHelp">
                    <small id="fileHelp" class="form-text text-muted">Please upload a valid pdf file. Size of
                        file should not be more than 1MB.</small>

                    @if ($errors->has('chapter_handout'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('chapter_handout') }}</strong>
                    </span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary" style="min-width:120px">Edit</button>
            </form>
        </div>
    </div>
</div>
@endsection
