<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Singer extends Model
{
    use Sluggable;

    protected $fillable = [
        'title', 'alias', 'keywords', 'description', 'full_description', 'image', 'views', 'active'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'alias' => [
                'source' => 'title'
            ]
        ];
    }

    public function getImage()
    {
        return url('uploads/singers/'.$this->image);
    }

    public function getImageThumbs()
    {
        return url('uploads/singers/thumbs/'.$this->image);
    }

    public function url()
    {
        return route('singer.show', ['alias' => $this->alias, 'id' => $this->id]);
    }

    public function comments()
    {
        $comments = Comment::where(['comments.type' => 'singer', 'comments.pcp_id' => $this->id, 'comments.status' => '1'])
            ->select('comments.*', 'users.name as first_name')
            ->join('users', 'users.id', '=', 'comments.user_id')
            ->orderBy('id', 'DESC')
            ->get();
        return $comments;
    }
}
