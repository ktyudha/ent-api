<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\PictureResource;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $picture = Picture::with(['user:id,name'])->get();
        return PictureResource::collection($picture);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => ['required', 'max:255'],
            'thumbnail' => ['required', 'image:jpeg|png', 'max:1024' ],
        ]);

        if ($request->thumbnail) {
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            $newName = Str::words($request->title, 3) . '-' . now()->timestamp . '.' . $extension;
            $request->file('thumbnail')->storeAs('images/users', $newName);
        }

        $picture = Picture::create([
            'title' => $request->title,
            'user_id' => Auth::id(),
            'thumbnail' => $request['thumbnail'] = $newName,
        ]);
        return new PictureResource($picture->loadMissing('user:id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function show(Picture $picture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function edit(Picture $picture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Picture $picture)
    {
        //
        $request->validate([
            'title' => ['required', 'max:255'],
            'thumbnail' => ['required', 'image:jpeg|png', 'max:1024' ],
        ]);


        $valuePicture =[
            'title' => $request->title,
            'user_id' => Auth::id(),
        ];

        $newName = null;
        if ($request->hasFile('thumbnail')) {
            if ($picture->thumbnail) {
                unlink('storage/images/users/'.$picture->thumbnail);
                $extension = $request->file('thumbnail')->getClientOriginalExtension();
                $newName = Str::words($request->username, 3) . '-' . now()->timestamp . '.' . $extension;
                $request->file('thumbnail')->storeAs('images/users', $newName);
            }
            $values['thumbnail'] = $newName;
        }

        $picture->update($valuePicture);

        return new PictureResource($picture->loadMissing('user:id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Picture $picture)
    {
        //
        if ($picture->thumbnail) {
            unlink('storage/images/users/'.$picture->thumbnail);
        }
    $picture->delete();
    return new PictureResource($picture->loadMissing('user:id'));
    }
}
