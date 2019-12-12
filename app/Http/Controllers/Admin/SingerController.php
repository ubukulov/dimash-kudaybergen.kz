<?php

namespace App\Http\Controllers\Admin;

use App\Singer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SingerController extends Controller
{
    protected $imagePath = 'uploads/singers/';
    protected $imagePathThumbs = '/uploads/singers/thumbs/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $singers = Singer::orderBy('id', 'DESC')->get();
        return view('admin.singer.index', compact('singers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.singer.create');
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
        $singer = Singer::create($data);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $img = \Image::make($file->getPathname());
            $hash_name = md5($file->getClientOriginalName());
            $file_name = $singer->id."_".$hash_name.'.jpg';

            $save_path = base_path('public/'.$this->imagePath);
            $img->save($save_path.$file_name);

            /*// сохранение миниатюры

            $save_path_thumbs = base_path('public/'.$this->imagePathThumbs);

            $img->resize(null, 250, function($constraint) {
                $constraint->aspectRatio();
            })->save($save_path_thumbs.$file_name);*/

            $singer->image = $file_name;
            $singer->save();
        }

        return redirect()->route('admin.singer.index');
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
        $singer = Singer::findOrFail($id);
        return view('admin.singer.edit', compact('singer'));
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
        $singer = Singer::findOrFail($id);
        $singer->update($data);
        $singer->save();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $img = \Image::make($file->getPathname());
            $hash_name = md5($file->getClientOriginalName());
            $file_name = $singer->id."_".$hash_name.'.jpg';

            $save_path = base_path('public/'.$this->imagePath);
            $img->save($save_path.$file_name);

            // сохранение миниатюры

            $save_path_thumbs = base_path('public/'.$this->imagePathThumbs);

            /*$img->resize(null, 250, function($constraint){
                $constraint->aspectRatio();
            })->save($save_path_thumbs.$file_name);*/

            // удалит старую картинку
            unlink($save_path.$singer->image);
            unlink($save_path_thumbs.$singer->image);

            $singer->image = $file_name;
            $singer->save();
        }

        return redirect()->route('admin.singer.index');
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
