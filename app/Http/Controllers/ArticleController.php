<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends BaseController
{
    public function index()
    {
        $articles = Article::orderBy('id', 'DESC')->get();
        return view('article.index', compact('articles'));
    }

    public function show($alias, $id)
    {
        $article = Article::findOrFail($id);
        $article->views++;
        $article->save();
        $this->seo()->metatags()->setKeywords($article->keywords);
        $this->seo()->setDescription(str_replace("&nbsp;",' ',strip_tags($article->description)));
        $this->seo()->addImages($article->getImage());
        $this->seo()->setTitle($article->title);
        $this->seo()->opengraph()->setType('article');
        $this->seo()->opengraph()->setUrl($article->url());
        $this->seo()->opengraph()->addProperty('image:size', 300);
        $this->seo()->setCanonical($article->url());
        return view('article.show', compact('article'));
    }
}
