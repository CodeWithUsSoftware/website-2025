<?php

namespace App\Http\Controllers;
use App\Models\StudentSpotLight;
use Illuminate\Http\Request;

class StudentSpotLightController extends Controller
{
     public function getStudentSpotlightVideos()
    {
        $student_spotlight_videos = StudentSpotLight::where('is_deleted',false)->with('tags','topics')->orderBy('spotlight_month','desc')->get();

        return view('student-spotlight-video',compact('student_spotlight_videos'));
    }
}
