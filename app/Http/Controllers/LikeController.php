<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store($id)
    {
        $like = new Like();
        $like->user_id = Auth::id();
        $like->file_id = $id;
        $like->save();

        return redirect()->route("file.show", compact("id"));
    }
}
