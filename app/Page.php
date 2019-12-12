<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title', 'alias', 'keywords', 'description', 'full_description', 'active'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function url()
    {
        return route('page.show', ['alias' => $this->alias]);
    }

    public function comments()
    {
        $comments = Comment::where(['comments.type' => 'page', 'comments.pcp_id' => $this->id, 'comments.status' => '1'])
            ->select('comments.*', 'users.name as first_name')
            ->join('users', 'users.id', '=', 'comments.user_id')
            ->orderBy('id', 'DESC')
            ->get();
        return $comments;
    }
}
