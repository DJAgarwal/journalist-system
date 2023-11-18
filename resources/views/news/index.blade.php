@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="m-0">Latest News</h5>
                        <a href="{{ route('news.create') }}" class="btn btn-primary">Create News</a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <div class="row" style="margin-bottom:20px;">
                        <div class="col-md-12">
                            <form method="GET" action="{{ route('news.index') }}" class="form-inline">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="headline">Headline:</label>
                                    <input type="text" class="form-control" id="headline" name="headline" placeholder="Search by Headline">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="author">Author:</label>
                                    <input type="text" class="form-control" id="author" name="author" placeholder="Search by Author">
                                </div>
                                <div class="form-group col-md-4">
                                    <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Search</button>
                                </div> 
                            </div> 
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($data as $dt)
                        <div class="col-md-6">
                            <div class="news-card">
                                <img src="https://via.placeholder.com/150" alt="News Image">
                                <div class="news-card-body">
                                    <h5>{{$dt->headline}}</h5>
                                    <p>{{$dt->description}}</p>
                                    <p>Date: {{$dt->published_at->format('d/m/Y')}}</p>
                                    <p>Location: {{$dt->location}}</p>
                                    <p>Author: {{$dt->author->name}}</p>
                                    <a href="#" class="btn btn-primary">Edit</a>
                                    <a href="#" class="btn btn-primary">View</a>
                                    <a href="#" class="btn btn-primary">Delete</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection