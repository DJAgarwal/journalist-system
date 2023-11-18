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
                    <div class="row">
                        <div class="col-md-12">
                            <form method="GET" action="{{ route('news.index') }}" class="form-inline">
                                <div class="form-group col-md-6" style="float:left">
                                    <label for="headline">Headline:</label>
                                </div>
                                <div class="form-group col-md-6" style="float:right">
                                    <button type="submit" class="btn btn-primary" style="margin-top: 20px;margin-left: 10px;">Search</button>
                                </div>  
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="news-card">
                                <img src="https://via.placeholder.com/150" alt="News Image">
                                <div class="news-card-body">
                                    <h5>News Headline</h5>
                                    <p>Description of the news. It can be a brief summary.</p>
                                    <p>Date: November 18, 2023</p>
                                    <p>Place: Ajmer</p>
                                    <p>Author: Ajmer</p>
                                    <a href="#" class="btn btn-primary">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection