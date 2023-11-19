<?php

namespace App\Http\Controllers;

use Auth, Log;
use Illuminate\Http\Request;
use App\Models\{News,User, Journalist};
use App\Http\Requests\{UpdateUserRequest};

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function profile(Request $request)
    {
        $data = User::with('journalist')->first();
        log::info($data);
        return view('journalist.profile',compact('data'));
    }
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::find($id);
        $journalist = Journalist::where('user_id',$id)->first();
        $data = $request->all(); 
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('journalist/images'), $imageName);
            $data['image'] = '/images/' . $imageName;
        }
        
        $user->update($data);
        $journalist->update($data);
        return redirect()->route('news.index')->with('success', 'Profile updated successfully.');
    }
}
