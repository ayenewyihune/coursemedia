<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function course_category() {
        return $this->belongsTo('App\CourseCategory');
    }

    public function likes() {
        return $this->hasMany('App\Like');
    }

    public function favorites() {
        return $this->hasMany('App\Favorite');
    }
}
