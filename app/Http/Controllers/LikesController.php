<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Like;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    public function store(Request $request, $course_id) {
        $check_liked = Like::where(['user_id'=>Auth::id(), 'course_id'=>$course_id])->get()->first();
        if ($check_liked != null) {
            $check_liked->delete();
            $like_text = 'Like';
        } else {
            $like = new Like();
            $like->user_id = Auth::id();
            $like->course_id = $course_id;
            $like->save();
            $like_text = 'Unike';
        }

        return back()->with('like_text', $like_text);
    }
}
