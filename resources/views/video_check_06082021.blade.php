@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Video
                </div>
                <div class="card-body">
                    @if($enrolment->video_file)
                    <div class="embed-responsive embed-responsive-1by1">
                        <iframe class="embed-responsive-item" src="{{ asset('storage/'.$enrolment->video_file) }}"></iframe>
                    </div>
                    @else
                        No video. Upload video to check <a href="{{ route('vidoerecord') }}">Upload here</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection