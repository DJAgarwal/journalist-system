@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="m-0">News Edit</h5>
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="headline">Headline:</label>
                                <input type="text" class="form-control @error('headline') is-invalid @enderror" id="headline" name="headline" value="{{ old('headline', $news->headline) }}" required>
                                @error('headline')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="location">Location:</label>
                                <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location', $news->location) }}" required>
                                @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="category">Category</label>
                                <select class="form-control" id="category" name="category">
                                    <option value="">Select a category</option>
                                    <option value="Sports" {{ $news->category == 'Sports' ? 'selected' : '' }}>Sports</option>
                                    <option value="Politics" {{ $news->category == 'Politics' ? 'selected' : '' }}>Politics</option>
                                    <option value="Crime" {{ $news->category == 'Crime' ? 'selected' : '' }}>Crime</option>
                                    <option value="Other" {{ $news->category == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="description">Description:</label>
                                <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description', $news->description) }}" required>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="published_at">Date:</label>
                                <input type="date" class="form-control @error('published_at') is-invalid @enderror" id="published_at" name="published_at" value="{{ old('published_at', $news->published_at->format('Y-m-d')) }}" required>
                                @error('published_at')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="image">Image:</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @if($news->image)
                                    <p>Current Image:</p>
                                    <img src="{{ asset('news' . $news->image) }}" alt="Current News Image" class="img-fluid">
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="audio">Audio:</label>
                                <input type="file" class="form-control @error('audio') is-invalid @enderror" id="audio" name="audio">
                                @error('audio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @if($news->audio)
                                    <p>Current Audio:</p>
                                    <audio controls>
                                        <source src="{{ asset('news' . $news->audio) }}" type="audio/mp3">
                                        Your browser does not support the audio element.
                                    </audio>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="video">Video:</label>
                                <input type="file" class="form-control @error('video') is-invalid @enderror" id="video" name="video">
                                @error('video')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @if($news->video)
                                    <p>Current Video:</p>
                                    <video controls width="400" height="300">
                                        <source src="{{ asset('news' . $news->video) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection