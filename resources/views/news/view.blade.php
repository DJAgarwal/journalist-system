@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="m-0">News Details</h5>
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">Headline:</dt>
                        <dd class="col-sm-9">{{ $news->headline }}</dd>
                        <dt class="col-sm-3">Description:</dt>
                        <dd class="col-sm-9">{{ $news->description }}</dd>
                        <dt class="col-sm-3">Category:</dt>
                        <dd class="col-sm-9">{{ $news->category }}</dd>
                        <dt class="col-sm-3">Published Date:</dt>
                        <dd class="col-sm-9">{{ $news->published_at->format('d/m/Y') }}</dd>
                        <dt class="col-sm-3">Location:</dt>
                        <dd class="col-sm-9">{{ $news->location }}</dd>
                        <dt class="col-sm-3">Image:</dt>
                        <dd class="col-sm-9">
                            @if($news->image)
                                <img src="{{ asset('news' . $news->image) }}" alt="News Image" class="img-fluid">
                            @else
                                No image available.
                            @endif
                        </dd>
                        <dt class="col-sm-3">Audio:</dt>
                        <dd class="col-sm-9">
                            @if($news->audio)
                                <audio controls>
                                    <source src="{{ asset('news' . $news->audio) }}" type="audio/mp3">
                                    Your browser does not support the audio element.
                                </audio>
                            @else
                                No audio available.
                            @endif
                        </dd>
                        <dt class="col-sm-3">Video:</dt>
                        <dd class="col-sm-9">
                            @if($news->video)
                                <video controls width="400" height="300">
                                    <source src="{{ asset('news' . $news->video) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @else
                                No video available.
                            @endif
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection