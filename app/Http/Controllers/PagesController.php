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
        return view('courses.main');
    }
}
