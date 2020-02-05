<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

class AuthorController extends BaseController
{
    protected $imagePath = 'uploads/posts/';
    protected $imagePathThumbs = '/uploads/posts/thumbs/';

    public function create()
    {
        return view('create_author_post');
    }

    public function store(Request $request)
    {
        $data = $request->except('file');
        $data['user_id'] = Auth::user()->id;
        $data['active'] = '0';
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

        return redirect()->route('author.posts');
    }

    public function show($alias, $id)
    {
        $post = Post::findOrFail($id);
        $post->views++;
        $post->save();
        $this->seo()->metatags()->setKeywords($post->keywords);
        $this->seo()->setDescription(str_replace("&nbsp;",' ',strip_tags($post->description)));
        $this->seo()->addImages($post->getImage());
        $this->seo()->setTitle($post->title);
        $this->seo()->opengraph()->setType('article');
        $this->seo()->opengraph()->setUrl($post->author_url());
        $this->seo()->opengraph()->addProperty('image:size', 300);
        $this->seo()->setCanonical($post->author_url());
        return view('show_author_post', compact('post'));
    }
}
