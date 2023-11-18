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
    public function index()
    {
        $data = News::with('author')->get();
        return view('news.index',compact('data'));
    }
    public function create()
    {
        return view('news.create');
    }
    public function store(StoreRequest $request)
    {
        $data = $request->all();
        $data['author_id'] = Auth::user()->id;
        News::create($data);
        return redirect()->route('news.index')->with('success', 'News article created successfully');
    }
}
