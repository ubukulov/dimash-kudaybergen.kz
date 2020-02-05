<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    protected $imagePath = 'uploads/posts/';
    protected $imagePathThumbs = '/uploads/posts/thumbs/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->whereNull('user_id')->get();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
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
        $post = Post::create($data);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $img = \Image::make($file->getPathname());
            $hash_name = md5($file->getClientOriginalName());
            $file_name = $post->id."_".$hash_name.'.jpg';

            $save_path = base_path('public/'.$this->imagePath);
            $img->save($save_path.$file_name);

            /*// сохранение миниатюры

            $save_path_thumbs = base_path('public/'.$this->imagePathThumbs);

            $img->resize(null, 250, function($constraint) {
                $constraint->aspectRatio();
            })->save($save_path_thumbs.$file_name);*/

            $post->image = $file_name;
            $post->save();
        }

        return redirect()->route('admin.post.index');
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
        $post = Post::findOrFail($id);
        return view('admin.post.edit', compact('post'));
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
        $post = Post::findOrFail($id);
        $post->update($data);
        $post->save();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $img = \Image::make($file->getPathname());
            $hash_name = md5($file->getClientOriginalName());
            $file_name = $post->id."_".$hash_name.'.jpg';

            $save_path = base_path('public/'.$this->imagePath);
            $img->save($save_path.$file_name);

            // сохранение миниатюры

            $save_path_thumbs = base_path('public/'.$this->imagePathThumbs);

            /*$img->resize(null, 250, function($constraint){
                $constraint->aspectRatio();
            })->save($save_path_thumbs.$file_name);*/

            // удалит старую картинку
            //unlink($save_path.$post->image);
            //unlink($save_path_thumbs.$post->image);

            $post->image = $file_name;
            $post->save();
        }

        return redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
		return redirect()->route('admin.post.index');
    }
}
