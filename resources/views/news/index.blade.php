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
                                    <label for="location">Location:</label>
                                    <input type="text" class="form-control" id="location" name="location" placeholder="Search by Location">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="from">From:</label>
                                    <input type="date" class="form-control" id="from" name="from" placeholder="Search by From Date">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="to">To:</label>
                                    <input type="date" class="form-control" id="to" name="to" placeholder="Search by To Date">
                                </div>
                                <div class="form-group col-md-4">
                                    <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Search</button>
                                    <a href="{{ route('news.index') }}" class="btn btn-secondary" style="margin-top: 20px; margin-left: 5px;">Reset</a>
                                </div> 
                            </div> 
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($data as $dt)
                        <div class="col-md-6">
                            <div class="news-card">
                                <img src="{{ asset('news'.$dt->image) }}" alt="News Image">
                                <div class="news-card-body">
                                    <h5>{{$dt->headline}}</h5>
                                    <p>{{$dt->description}}</p>
                                    <p>Category: {{$dt->category}}</p>
                                    <p>Date: {{$dt->published_at->format('d/m/Y')}} | Location: {{$dt->location}}</p>
                                    <p>Author: {{$dt->author->name}}</p>
                                    <a href="{{ route('news.edit', $dt->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('news.view', $dt->id) }}" class="btn btn-primary">View</a>
                                    <form action="{{ route('news.destroy', $dt->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this news?')">Delete</button>
                                        </form>
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