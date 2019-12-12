<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\CommentResource;
use App\User;

class CommentController extends BaseController
{
    public function index(Request $request)
    {
        $data = $request->all();
        return CommentResource::collection(Comment::getComments($data['type'], $data['pcp_id']));
    }

    public function create(Request $request)
    {
        $data = $request->all();
        DB::beginTransaction();
        try {
            $user = User::exists($data['email']);
            if ($user) {
                $data['user_id'] = $user->id;
            } else {
                $user = User::createUser($request->except(['type', 'pcp_id', 'comment']));
                $data['user_id'] = $user->id;
            }
            Comment::createComment($data);
            DB::commit();
            return response('Комментария успешно отправлено', 200);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response("Ошибка сервера: $exception", 500);
        }
    }
}
