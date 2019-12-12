<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Concert extends Model
{
    use Sluggable;

    protected $fillable = [
        'title', 'alias', 'keywords', 'description', 'full_description', 'active', 'views', 'image'
    ];

    protected $dates = ['created_at', 'updated_at'];

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
        return asset('uploads/concerts/'.$this->image);
    }

    public function getImageThumbs()
    {
        return asset('uploads/concerts/thumbs/'.$this->image);
    }
}
