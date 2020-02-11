<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    protected $imagePath = 'uploads/articles/';
    protected $imagePathThumbs = '/uploads/articles/thumbs/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('id', 'DESC')->get();
        return view('admin.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.article.create');
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
        $article = Article::create($data);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $img = \Image::make($file->getPathname());
            $hash_name = md5($file->getClientOriginalName());
            $file_name = $article->id."_".$hash_name.'.jpg';

            $save_path = base_path('public/'.$this->imagePath);
            $img->save($save_path.$file_name);

            /*// сохранение миниатюры

            $save_path_thumbs = base_path('public/'.$this->imagePathThumbs);

            $img->resize(null, 250, function($constraint) {
                $constraint->aspectRatio();
            })->save($save_path_thumbs.$file_name);*/

            $article->image = $file_name;
            $article->save();
        }

        return redirect()->route('admin.article.index');
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
        $article = Article::findOrFail($id);
        return view('admin.article.edit', compact('article'));
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
        $article = Article::findOrFail($id);
        $article->update($data);
        $article->save();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $img = \Image::make($file->getPathname());
            $hash_name = md5($file->getClientOriginalName());
            $file_name = $article->id."_".$hash_name.'.jpg';

            $save_path = base_path('public/'.$this->imagePath);
            $img->save($save_path.$file_name);

            // сохранение миниатюры

            $save_path_thumbs = base_path('public/'.$this->imagePathThumbs);

            /*$img->resize(null, 250, function($constraint){
                $constraint->aspectRatio();
            })->save($save_path_thumbs.$file_name);*/

            // удалит старую картинку
            if (file_exists($save_path.$article->image)) {
                unlink($save_path.$article->image);
            }

            if (file_exists($save_path_thumbs.$article->image)) {
                unlink($save_path_thumbs.$article->image);
            }

            $article->image = $file_name;
            $article->save();
        }

        return redirect()->route('admin.article.index');
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
