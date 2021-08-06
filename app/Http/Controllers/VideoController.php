<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Enrolment;

class VideoController extends Controller
{

    public function upload(Request $request)
    {
        
        $videoPath = '';
        if($request->hasFile('video-blob')){
            $videoName = $request->file('video-blob')->getClientOriginalName();
            $videoPath = $request->file('video-blob')->storeAs('videos', $videoName, 'public');
        }
        return $videoPath;
    }

    public function check(Request $request, $application_id=null)
    {
        $q = Enrolment::whereNotNull('video_file');
        if ($application_id) {
            $enrolment = $q->where('application_id', $application_id);
        }
        $enrolment = $q->first();

        return view('video_check', compact('enrolment'));
    }
}
