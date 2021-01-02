<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function random($count)
    {
        $blogs = Blog::select('*')->inRandomOrder()->limit($count)->get();
        $data['blogs'] = $blogs;

        $response = [
            "response_code" => "00",
            "response_message" => "success",
            "data" => $data
        ];

        return response($response, 200)
            ->header('Content-Type', 'text/json');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes: jpg,jpeg,png'
        ]);

        $blog = Blog::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_ext = $image->getClientOriginalExtension();
            $image_name = $blog->id.".".$image_ext;
            $image_folder = "/photos/campaign/";
            $image_location = $image_folder.$image_name;

            try {
                $image->move(public_path($image_folder), $image_name);
                $blog->update([
                    'image' => $image_location
                ]);
            } catch (\Exception $e) {
                $response = [
                    "response_code" => "00",
                    "response_message" => "gambar gagal diupload",
                ];
                return response($response, 200)
                    ->header('Content-Type', 'text/json');
            }
        }

        $data['blog'] = $blog;

        $response = [
            "response_code" => "00",
            "response_message" => "success",
            "data" => $data
        ];

        return response($response, 200)
            ->header('Content-Type', 'text/json');
    }
}
