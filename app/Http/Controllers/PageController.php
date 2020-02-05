<?php

namespace App\Http\Controllers;

use App\Clip;
use App\Page;
use App\Post;
use App\Concert;
use Illuminate\Http\Request;

class PageController extends BaseController
{
    public function show($alias)
    {
        $page = Page::whereAlias($alias)->first();
        if ($page) {
            $this->seo()->setTitle('Биография Димаш Кудайберген');
            $this->seo()->setDescription('биография Димаш Кудайберген');
            $this->seo()->addImages(url('/img/album-art/dimash.jpg'));
            $this->seo()->setCanonical($page->url());

            return view('page.show', compact('page'));

        } elseif($alias == 'musics') {
            $this->seo()->setTitle('Песни Димаш Кудайберген');
            $this->seo()->setDescription('На сайте вы можете слушать и скачать песни Димаш Кудайберген');
            $this->seo()->addImages(url('/img/album-art/dimash.jpg'));
            $this->seo()->setCanonical(url('page/musics'));

            return view('page.musics');

        } elseif($alias == 'klipy') {
            $clips = Clip::orderBy('id', 'DESC')->get();
            $this->seo()->setTitle('Клипы Димаш Кудайберген');
            $this->seo()->setDescription('На сайте вы можете посмотреть клипы Димаш Кудайберген');
            $this->seo()->addImages(url('/img/album-art/dimash.jpg'));
            $this->seo()->setCanonical(url('page/klipy'));

            return view('page.clips', [
                'clips' => $clips
            ]);
        } elseif($alias == 'concerts') {
            $concerts = Concert::orderBy('id', 'DESC')->get();
            $this->seo()->setTitle('Концерты Димаш Кудайберген');
            $this->seo()->setDescription('На сайте вы можете посмотреть концерты Димаш Кудайберген');
            $this->seo()->addImages(url('/img/album-art/dimash.jpg'));
            $this->seo()->setCanonical(url('page/concerts'));

            return view('page.concerts', [
                'concerts' => $concerts
            ]);
        }

        abort(404);
    }

    public function news_author()
    {
        $posts = Post::orderBy('id', 'DESC')->whereNotNull('user_id')->paginate(10);
        return view('posts_author', compact('posts'));
    }
}
