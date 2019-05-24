<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Favorite;
use Illuminate\Support\Facades\Auth;

class FavoritesController extends Controller
{
    public function store(Request $request, $course_id) {
        $check_favor = Favorite::where(['user_id'=> Auth::id(), 'course_id'=>$course_id])->get()->first();
        if ($check_favor != null) {
            $check_favor->delete();
            $favorite_text = 'Add to favorites';
        } else {
            $favorite = new Favorite();
            $favorite->user_id = Auth::id();
            $favorite->course_id = $course_id;
            $favorite->save();
            $favorite_text = 'Remove from favorites';
        }

        return back()->with('favorite_text', $favorite_text);
    }
}
