<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrgGovEnlorment;
use DB;

class OrgGovEnlormentController extends Controller
{
    public function create(){

        // echo "This is ORG";
        return view('saurav.org');
    }

    public function store(Request $request)
    {   $OrgGovEnlorment = new OrgGovEnlorment;
        $OrgGovEnlorment->certification_type = $request->input('certification_type');
        $OrgGovEnlorment->validity = $request->input('validity');
        $OrgGovEnlorment->orgtype = $request->input('orgtype');
        $OrgGovEnlorment->gstno = $request->input('gstno');
        $OrgGovEnlorment->govorgno = $request->input('govorgno');
        $OrgGovEnlorment->departmentname = $request->input('departmentname');
        $OrgGovEnlorment->orgpan = $request->input('orgpan');
        $OrgGovEnlorment->orgaddress = $request->input('orgaddress');
        
        if($request->hasfile('orgdocument'))
        {
            $file= $request->file('orgdocument');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('gov/impdoc',$filename);
            $OrgGovEnlorment->orgdocument = $filename;
        }
                // $orgenrolment->photo_file = $request->input('photo_file');
                if($request->hasfile('photo_file'))
                {
                    $file= $request->file('photo_file');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time().'.'.$extension;
                    $file->move('gov/picphoto',$filename);
                    $OrgGovEnlorment->photo_file = $filename;
                }
                // $orgenrolment->pan_file = $request->input('pan_file');
                 if($request->hasfile('pan_file'))
                {
                    $file= $request->file('pan_file');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time().'.'.$extension;
                    $file->move('gov/panphoto',$filename);
                    $OrgGovEnlorment->pan_file = $filename;
                }
                // $orgenrolment->orgid_file = $request->input('orgid_file');
                if($request->hasfile('orgid_file'))
                {
                    $file= $request->file('orgid_file');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time().'.'.$extension;
                    $file->move('gov/orgid',$filename);
                    $OrgGovEnlorment->orgid_file = $filename;
                }
        
        // image work
        $OrgGovEnlorment->kycid = $request->input('kycid');
        $OrgGovEnlorment->kycpin = $request->input('kycpin');
        $OrgGovEnlorment->ekycid = $request->input('ekycid');
        $OrgGovEnlorment->ekycpin = $request->input('ekycpin');
        $OrgGovEnlorment->pan = $request->input('pan');
        $OrgGovEnlorment->orgname = $request->input('orgname');
        $OrgGovEnlorment->mobile = $request->input('mobile');
        $OrgGovEnlorment->email = $request->input('email');
        $OrgGovEnlorment->birthday = $request->input('birthday');
        $OrgGovEnlorment->gender = $request->input('gender');
        $OrgGovEnlorment->userkycpin = $request->input('userkycpin');
        $OrgGovEnlorment->userkycpinconfirm = $request->input('userkycpinconfirm');

        $OrgGovEnlorment->save();

        $org = OrgGovEnlorment::latest()->first();

           return view('saurav.govlast' , compact('org'));
    }

}
