<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Clip;

class ClipController extends Controller
{
    protected $imagePath = 'uploads/clips/';
    protected $imagePathThumbs = '/uploads/clips/thumbs/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clips = Clip::orderBy('id', 'DESC')->paginate(10);
        return view('admin.clip.index', compact('clips'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clip.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('file');
        $clip = Clip::create($data);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $img = \Image::make($file->getPathname());
            $hash_name = md5($file->getClientOriginalName());
            $file_name = $clip->id."_".$hash_name.'.jpg';

            $save_path = base_path('public/'.$this->imagePath);
            $img->save($save_path.$file_name);

            // сохранение миниатюры

            $save_path_thumbs = base_path('public/'.$this->imagePathThumbs);

            $img->resize(320, 180)->save($save_path_thumbs.$file_name);

            $clip->image = $file_name;
            $clip->save();
        }

        return redirect()->route('admin.clip.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clip = Clip::findOrFail($id);
        return view('admin.clip.edit', compact('clip'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('file');
        $clip = Clip::findOrFail($id);
        $clip->update($data);
        $clip->save();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $img = \Image::make($file->getPathname());
            $hash_name = md5($file->getClientOriginalName());
            $file_name = $clip->id."_".$hash_name.'.jpg';

            $save_path = base_path('public/'.$this->imagePath);
            $img->save($save_path.$file_name);

            // сохранение миниатюры

            $save_path_thumbs = base_path('public/'.$this->imagePathThumbs);

            $img->resize(320, 180)->save($save_path_thumbs.$file_name);

            $clip->image = $file_name;
            $clip->save();
        }

        return redirect()->route('admin.clip.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
