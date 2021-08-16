<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Enrolment;

class VideoController extends Controller
{

    public function upload(Request $request)
    {
        $application_id = $request->application_id;
        $videoFileHash = $request->video_file_hash;
        $videoPath = '';
        if($request->hasFile('video-blob')){
            $videoName = $request->file('video-blob')->getClientOriginalName();
            $videoPath = $request->file('video-blob')->storeAs('videos', $videoName, 'public'); 
            $q1 = Enrolment::where('application_id',$application_id)->first();
            $q1->video_file = $videoName;
            $q1->video_file_hash = $videoFileHash;
            $q1->save();
        }
        return $videoFileHash;
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
