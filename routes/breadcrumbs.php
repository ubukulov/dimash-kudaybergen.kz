<?php
// Home Page
Breadcrumbs::register('homepage', function ($breadcrumbs) {
    $breadcrumbs->push('Главная', route('home'));
});

// Catalog
//Breadcrumbs::register('catalog.view', function ($breadcrumbs, $category) {
//    $breadcrumbs->parent('homepage');
//    $ancestors = null;
//    if ($category != null) {
//        $ancestors = \App\Models\Category::select(['id', 'title', 'alias', 'parent_id'])->defaultOrder()->ancestorsOf($category->id);
//    }
//
//    if ($ancestors != null) {
//        foreach ($ancestors as $item) {
//            $breadcrumbs->push($item->title, route('catalog.view', ['alias' => $item->alias]));
//        }
//    }
//
//    $breadcrumbs->push($category->title, route('catalog.view', ['alias' => $category->alias]));
//});

// Post
Breadcrumbs::register('post.show', function ($breadcrumbs, $post = null) {
    $breadcrumbs->parent('homepage');
    $breadcrumbs->push($post->title);
});

// Articles
Breadcrumbs::register('articles', function ($breadcrumbs) {
    $breadcrumbs->parent('homepage');
    $breadcrumbs->push('Статьи');
});

// Article
Breadcrumbs::register('article.show', function ($breadcrumbs, $article) {
    $breadcrumbs->parent('homepage');
    $breadcrumbs->push('Статьи', route('articles'));
    $breadcrumbs->push($article->title);
});

// Singers
Breadcrumbs::register('singers', function ($breadcrumbs) {
    $breadcrumbs->parent('homepage');
    $breadcrumbs->push('Singer-2017');
});

// Singer
Breadcrumbs::register('singer.show', function ($breadcrumbs, $singer = null) {
    $breadcrumbs->parent('homepage');
    $breadcrumbs->push($singer->title);
});

// Page
Breadcrumbs::register('page.show', function ($breadcrumbs, $page = null, $b_title = null) {
    $breadcrumbs->parent('homepage');
    if ($page == null) {
        $breadcrumbs->push($b_title);
    } else {
        $breadcrumbs->push($page->title);
    }
});

// Search
Breadcrumbs::register('search', function($breadcrumbs) {
    $breadcrumbs->parent('homepage');
    $breadcrumbs->push('Результаты поиска');
});

// news author
Breadcrumbs::register('author.post', function($breadcrumbs) {
    $breadcrumbs->parent('homepage');
    $breadcrumbs->push('Автор посты');
});

//// Login form
//Breadcrumbs::register('login', function($breadcrumbs) {
//    $breadcrumbs->parent('homepage');
//    $breadcrumbs->push('Форма авторизации');
//});
//
//// Register form
//Breadcrumbs::register('registration', function($breadcrumbs) {
//    $breadcrumbs->parent('homepage');
//    $breadcrumbs->push('Форма регистрации');
//});
//
//// Cart
//Breadcrumbs::register('cart.index', function($breadcrumbs) {
//    $breadcrumbs->parent('homepage');
//    $breadcrumbs->push('Корзина');
//});
//
//// Checkout
//Breadcrumbs::register('checkout.index', function($breadcrumbs) {
//    $breadcrumbs->parent('homepage');
//    $breadcrumbs->push('Оформление заказа');
//});
//
//// Search
//Breadcrumbs::register('search', function($breadcrumbs) {
//    $breadcrumbs->parent('homepage');
//    $breadcrumbs->push('Результаты поиска');
//});
