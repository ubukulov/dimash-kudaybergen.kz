<?php

namespace App\Http\Controllers;

use App\Singer;
use Illuminate\Http\Request;

class SingerController extends BaseController
{
    public function index()
    {
        $singers = Singer::orderBy('id', 'DESC')->get();
        return view('singer.show', compact('singers'));
    }

    public function show($alias, $id)
    {
        $singer = Singer::findOrFail($id);
        $singer->views++;
        $singer->save();
        $this->seo()->metatags()->setKeywords($singer->keywords);
        $this->seo()->setDescription(str_replace("&nbsp;",' ',strip_tags($singer->description)));
        $this->seo()->addImages($singer->getImage());
        $this->seo()->setTitle($singer->title);
        $this->seo()->opengraph()->setType('article');
        $this->seo()->opengraph()->setUrl($singer->url());
        $this->seo()->opengraph()->addProperty('image:size', 300);
        $this->seo()->setCanonical($singer->url());
        return view('singer.show', compact('singer'));
    }
}
