<?php

namespace App\Console\Commands;

use App\Clip;
use App\Post;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use App\Article;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $posts = Post::all();
        $clips = Clip::all();
        $articles = Article::all();
        $sitemap = Sitemap::create('https://dimash-kudaybergen.kz/');

        $sitemap->add('https://dimash-kudaybergen.kz/');
        $sitemap->add('https://dimash-kudaybergen.kz/page/concerts');
        $sitemap->add('https://dimash-kudaybergen.kz/singer');
        $sitemap->add('https://dimash-kudaybergen.kz/page/klipy');
        $sitemap->add('https://dimash-kudaybergen.kz/page/musics');
        $sitemap->add('https://dimash-kudaybergen.kz/articles');
        $sitemap->add('https://dimash-kudaybergen.kz/page/biografiya');

        foreach($posts as $post) {
            $sitemap->add($post->url());
        }

        foreach($clips as $clip) {
            $sitemap->add($clip->url());
        }

        foreach($articles as $article) {
            $sitemap->add($article->url());
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generate successfully.');
    }
}
