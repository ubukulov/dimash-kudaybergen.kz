<?php

namespace App\Console\Commands;

use App\Clip;
use App\Post;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;

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
        $sitemap = Sitemap::create('https://qairat-nurtas.kz');
        $sitemap->add('https://qairat-nurtas.kz');

        foreach($posts as $post) {
            $sitemap->add($post->url());
        }

        foreach($clips as $clip) {
            $sitemap->add($clip->url());
        }
        $sitemap->add(url('page/biografiya-kayrata-nurtasa'));
        $sitemap->add(url('page/kajrat-nurtas-klipy'));
        $sitemap->add(url('page/qairat-nurtas-musics'));

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generate successfully.');
    }
}
