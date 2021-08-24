<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orgenrolment;
use DB;


class OrgEnrolmentController extends Controller
{
    public function create(){
        return view('saurav.orggovnon');
    }

// YE ORG GOV NON ka Controller Hai
    public function store(Request $request)
    {   $orgenrolment = new Orgenrolment;
        $orgenrolment->certification_type = $request->input('certification_type');
        $orgenrolment->validity = $request->input('validity');
        $orgenrolment->orgtype = $request->input('orgtype');
        $orgenrolment->gstno = $request->input('gstno');
        $orgenrolment->govorgno = $request->input('govorgno');
        $orgenrolment->departmentname = $request->input('departmentname');
        $orgenrolment->orgpan = $request->input('orgpan');
        $orgenrolment->orgaddress = $request->input('orgaddress');
        // $orgenrolment->orgdocument = $request->input('orgdocument');
        if($request->hasfile('orgdocument'))
        {
            $file= $request->file('orgdocument');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('impdoc',$filename);
            $orgenrolment->orgdocument = $filename;
        }
                // $orgenrolment->photo_file = $request->input('photo_file');
                if($request->hasfile('photo_file'))
                {
                    $file= $request->file('photo_file');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time().'.'.$extension;
                    $file->move('picphoto',$filename);
                    $orgenrolment->photo_file = $filename;
                }
                // $orgenrolment->pan_file = $request->input('pan_file');
                 if($request->hasfile('pan_file'))
                {
                    $file= $request->file('pan_file');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time().'.'.$extension;
                    $file->move('panphoto',$filename);
                    $orgenrolment->pan_file = $filename;
                }
                // $orgenrolment->orgid_file = $request->input('orgid_file');
                if($request->hasfile('orgid_file'))
                {
                    $file= $request->file('orgid_file');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time().'.'.$extension;
                    $file->move('orgid',$filename);
                    $orgenrolment->orgid_file = $filename;
                }
        
        // image work
        $orgenrolment->kycid = $request->input('kycid');
        $orgenrolment->kycpin = $request->input('kycpin');
        $orgenrolment->ekycid = $request->input('ekycid');
        $orgenrolment->ekycpin = $request->input('ekycpin');
        $orgenrolment->pan = $request->input('pan');
        $orgenrolment->orgname = $request->input('orgname');
        $orgenrolment->mobile = $request->input('mobile');
        $orgenrolment->email = $request->input('email');
        $orgenrolment->birthday = $request->input('birthday');
        $orgenrolment->gender = $request->input('gender');
        $orgenrolment->userkycpin = $request->input('userkycpin');
        $orgenrolment->userkycpinconfirm = $request->input('userkycpinconfirm');

        $orgenrolment->save();

        $org = Orgenrolment::latest()->first();

           return view('saurav.last' , compact('org'));
    }

    public function show(Orgenrolment $org)
    {
        // return DB::table('orgenrolments')->order_by('upload_time', 'desc')->first();
        $org = Orgenrolment::latest()->first();
        return view('saurav.last' , compact('org'));
    }
}
