<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function store(Request $request) { 
        
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image_name = $request->image->extension();
        $path = Storage::disk('s3')->put('images', $request->image);
        $path = Storage::disk('s3')->url($path);
        return back()
            ->with('success', 'Image Uploaded')
            ->with('image', $path);
    }
}
