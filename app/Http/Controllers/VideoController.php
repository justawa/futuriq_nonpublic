<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
Use \Carbon\Carbon;
use App\Enrolment;

class VideoController extends Controller
{

    public function upload(Request $request)
    {
        
        $application_id = $request->application_id;
        $videoFileHash = $request->video_file_hash;
        $videoPath = '';
        // if($request->hasFile('video-blob')){
        //     $videoName = $request->file('video-blob')->getClientOriginalName();
        //     $videoPath = $request->file('video-blob')->storeAs('videos', $videoName, 'public'); 
        //     $q1 = Enrolment::where('application_id',$application_id)->first();
        //     $q1->video_file = $videoPath;
        //     $q1->video_file_hash = $videoFileHash;
        //     $q1->save();
        // }
        $datetime = Carbon::now()->format('Y-m-d H:m:s');

        if($request->hasFile('video-blob')) {

            $file=$request->file('video-blob');
 
                //get filename with extension
                $final_image_name = $request->file('video-blob')->getClientOriginalName();
         
                $destination_path = public_path('/videos/');

                $file->move($destination_path , $final_image_name);


         $q1 = Enrolment::where('application_id',$application_id)->first();
                
                $q1->video_file = $final_image_name;
                $q1->video_file_hash = $videoFileHash;
                $q1->save();
                //Store $filenametostore in the database
            }

         $data['new'] = [
                        'image_name' => $final_image_name,
                        'datetime' => $datetime,
                    ];

        return json_encode($data);
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
