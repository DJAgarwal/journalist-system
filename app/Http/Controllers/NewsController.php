<?php

namespace App\Http\Controllers;

use Auth, Log;
use Illuminate\Http\Request;
use App\Http\Requests\{StoreRequest};
use App\Models\{News,User};

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $query = News::with('author');
        if ($request->has('headline')) {
            $query->where('headline', 'like', '%' . $request->input('headline') . '%');
        }
        if ($request->has('location')) {
            $query->where('location', 'like', '%' . $request->input('location') . '%');
        }
        if ($request->has('author')) {
            $query->whereHas('author', function ($subquery) use ($request) {
                $subquery->where('name', 'like', '%' . $request->input('author') . '%');
            });
        }
        if ($request->filled('from') && $request->filled('to')) {
            $fromDate = $request->input('from');
            $toDate = $request->input('to');
            $query->whereBetween('published_at', [$fromDate, $toDate]);
        }
        $data = $query->get();
        return view('news.index',compact('data'));
    }
    public function create()
    {
        return view('news.create');
    }
    public function store(StoreRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('news/images'), $imageName);
            $data['image'] = '/images/' . $imageName;
        }
        if ($request->hasFile('audio')) {
            $audioName = time() . '_' . $request->file('audio')->getClientOriginalName();
            $request->file('audio')->move(public_path('news/audio'), $audioName);
            $data['audio'] = '/audio/' . $audioName;
        }
        if ($request->hasFile('video')) {
            $videoName = time() . '_' . $request->file('video')->getClientOriginalName();
            $request->file('video')->move(public_path('news/video'), $videoName);
            $data['video'] = '/video/' . $videoName;
        }
        $data['author_id'] = Auth::user()->id;
        News::create($data);
        return redirect()->route('news.index')->with('success', 'News article created successfully');
    }
    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('news.edit',compact('news'));
    }
    public function update(StoreRequest $request, $id)
    {
        $news = News::find($id);
        $data = $request->all(); 
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('news/images'), $imageName);
            $data['image'] = '/images/' . $imageName;
        }
        if ($request->hasFile('audio')) {
            $audioName = time() . '_' . $request->file('audio')->getClientOriginalName();
            $request->file('audio')->move(public_path('news/audio'), $audioName);
            $data['audio'] = '/audio/' . $audioName;
        }
        if ($request->hasFile('video')) {
            $videoName = time() . '_' . $request->file('video')->getClientOriginalName();
            $request->file('video')->move(public_path('news/video'), $videoName);
            $data['video'] = '/video/' . $videoName;
        }
        $news->update($data);
        return redirect()->route('news.index')->with('success', 'News updated successfully.');
    }
    public function view($id)
    {
        $news = News::findOrFail($id);
        return view('news.view',compact('news'));
    }
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        return redirect()->route('news.index')->with('success', 'News article deleted successfully');
    }
}
