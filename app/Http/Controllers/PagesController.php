<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransferRequest;
use App\ContactUs;
use App\Course;
use App\Chapter;
use Mail;

class PagesController extends Controller
{
    // This will display the courses page
    public function index(){
        $courses = Course::take(16)->inRandomOrder()->get();
        $chapter_number = 1;
        return view('courses.main')->with([
            'courses'=> $courses,
            'chapter_number'=> $chapter_number
        ]);
    }
}
