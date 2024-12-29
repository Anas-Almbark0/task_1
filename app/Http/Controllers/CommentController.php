<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function store(File $file)
    {
        $validate = request()->validate([
            "comment" => "string|required"
        ]);
        $comment = new Comment();
        $comment->comment = $validate['comment'];
        $comment->file_id = $file->id;
        $comment->user_id = Auth::id();
        $comment->save();

        return redirect()->route("file.show", ["id" => $file->id])->with("success", "the idea was created");
    }
}
