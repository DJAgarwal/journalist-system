@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="m-0">Profile Edit</h5>
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="headline">Name:</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $data->name) }}" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                           
                            <div class="form-group col-md-6">
                                <label>Gender:</label><br>
                                <div class="form-check form-check-inline" style="margin-top: 2%;">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="Male" {{ $data->journalist->gender === 'Male' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="Female" {{ $data->journalist->gender === 'Female' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="other" value="Other" {{ $data->journalist->gender === 'Other' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="other">Other</label>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="image">Profile Image:</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @if($data->journalist->image)
                                    <p>Current Image:</p>
                                    <img src="{{ asset('journalist' . $data->journalist->image) }}" alt="Current News Image" class="img-fluid" style="width: 100px; height: 100px;">
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