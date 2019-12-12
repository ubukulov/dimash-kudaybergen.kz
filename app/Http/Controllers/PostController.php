<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends BaseController
{
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
        $this->seo()->opengraph()->setUrl($post->url());
        $this->seo()->opengraph()->addProperty('image:size', 300);
        $this->seo()->setCanonical($post->url());
        return view('post.show', compact('post'));
    }
}
