<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'type', 'parent_id', 'user_id', 'pcp_id', 'comment', 'status'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    /**
     * @return object
     */
    public function user()
    {
        return $this->hasOne('App\User');
    }

    /**
     * @param string $type
     * @param integer $pcpId
     * @return object
     */
    public static function getComments($type, $pcpId)
    {
        $comments = Comment::where(['type' => $type, 'pcp_id' => $pcpId, 'status' => '1'])->orderBy('id', 'DESC')->get();
        return $comments;
    }

    /**
     * @param array $data
     */
    public static function createComment($data)
    {
        Comment::create([
            'type' => $data['type'], 'user_id' => $data['user_id'], 'pcp_id' => $data['pcp_id'], 'comment' => $data['comment'], 'parent_id' => 0
        ]);
    }
}
