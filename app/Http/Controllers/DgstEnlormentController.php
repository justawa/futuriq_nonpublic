<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Dgstenlorment;
use DB;



class DgstEnlormentController extends Controller
{
    

        public function create(){

            return view('saurav.orggovdgst');
        }
    
        public function store(Request $request)
        {  
            $Dgstenlorment = new Dgstenlorment;
            $Dgstenlorment->certification_type = $request->input('certification_type');
            $Dgstenlorment->validity = $request->input('validity');
            $Dgstenlorment->orgtype = $request->input('orgtype');
            $Dgstenlorment->gstno = $request->input('gstno');
            $Dgstenlorment->govorgno = $request->input('govorgno');
            $Dgstenlorment->dgftiec = $request->input('dgftiec');
            $Dgstenlorment->dgftcode = $request->input('dgftcode');
            $Dgstenlorment->branchcode = $request->input('branchcode');
            $Dgstenlorment->orgpan = $request->input('orgpan');
            $Dgstenlorment->orgaddress = $request->input('orgaddress');
        
            if($request->hasfile('orgdocument'))
            {
                $file= $request->file('orgdocument');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('dgst/impdoc',$filename);
                $Dgstenlorment->orgdocument = $filename;
            }
                    // $orgenrolment->photo_file = $request->input('photo_file');
                    if($request->hasfile('photo_file'))
                    {
                        $file= $request->file('photo_file');
                        $extension = $file->getClientOriginalExtension();
                        $filename = time().'.'.$extension;
                        $file->move('dgst/picphoto',$filename);
                        $Dgstenlorment->photo_file = $filename;
                    }
                    // $orgenrolment->pan_file = $request->input('pan_file');
                     if($request->hasfile('pan_file'))
                    {
                        $file= $request->file('pan_file');
                        $extension = $file->getClientOriginalExtension();
                        $filename = time().'.'.$extension;
                        $file->move('dgst/panphoto',$filename);
                        $Dgstenlorment->pan_file = $filename;
                    }
                    // $orgenrolment->orgid_file = $request->input('orgid_file');
                    if($request->hasfile('orgid_file'))
                    {
                        $file= $request->file('orgid_file');
                        $extension = $file->getClientOriginalExtension();
                        $filename = time().'.'.$extension;
                        $file->move('dgst/orgid',$filename);
                        $Dgstenlorment->orgid_file = $filename;
                    }
            
            // image work
            $Dgstenlorment->kycid = $request->input('kycid');
            $Dgstenlorment->kycpin = $request->input('kycpin');
            $Dgstenlorment->ekycid = $request->input('ekycid');
            $Dgstenlorment->ekycpin = $request->input('ekycpin');
            $Dgstenlorment->pan = $request->input('pan');
            $Dgstenlorment->orgname = $request->input('orgname');
            $Dgstenlorment->mobile = $request->input('mobile');
            $Dgstenlorment->email = $request->input('email');
            $Dgstenlorment->birthday = $request->input('birthday');
            $Dgstenlorment->gender = $request->input('gender');
            $Dgstenlorment->userkycpin = $request->input('userkycpin');
            $Dgstenlorment->userkycpinconfirm = $request->input('userkycpinconfirm');
    
            $Dgstenlorment->save();
    
            $org = Dgstenlorment::latest()->first();
    
               return view('saurav.dgstlast' , compact('org'));
        }
    


}
