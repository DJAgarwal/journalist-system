@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="m-0">News Create</h5>
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('news.store') }}" method="POST">
                        @csrf
                        <div class="row">
                        <div class="form-group col-md-6">
                            <label for="headline">Headline:</label>
                            <input type="text" class="form-control" id="headline" name="headline" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="location">Location:</label>
                            <input type="text" class="form-control" id="location" name="location" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="description">Description:</label>
                            <input type="text" class="form-control" id="description" name="description" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="published_at">Date:</label>
                            <input type="date" class="form-control" id="published_at" name="published_at" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="image">Image:</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="audio">Audio:</label>
                            <input type="file" class="form-control" id="audio" name="audio">
                        </div>
                        <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection