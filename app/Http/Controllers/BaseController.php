<?php

namespace App\Http\Controllers;

use App\Article;
use Artesaos\SEOTools\Traits\SEOTools;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use View;
use App\Post;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class BaseController extends Controller
{
    use SEOToolsTrait;

    protected $agent;

    public function __construct()
    {
        $this->agent = new Agent();
        $this->seo()->metatags()->addMeta('robots', 'index, follow');
        $this->seo()->opengraph()->addProperty('locale', 'ru_RU');
        $this->seo()->metatags()->setKeywords('димаш, димаш кудайберген, кудайберген, dimash, kudaibergen');
        $this->seo()->opengraph()->setSiteName('Сайт про Димаша Кудайбергена');
		$popular_posts = Post::orderBy('views', 'DESC')->limit(10)->get();
		$popular_articles = Article::orderBy('views', 'DESC')->limit(10)->get();
        View::share('agent', $this->agent);
        View::share('popular_posts', $popular_posts);
        View::share('popular_articles', $popular_articles);
    }
}
