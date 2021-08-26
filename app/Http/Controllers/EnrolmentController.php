<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EnrolmentRequest;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;
use App\Enrolment;
use Illuminate\Support\Facades\Mail;
use DOMPDF;
use App\Mail\sendOtp;


class EnrolmentController extends Controller
{

    public function apply_dsc()
    {
        return view('enrolment.apply_dsc');
    }

    public function store(EnrolmentRequest $request)
    {
        dd($request);
        $photoPath = '';
        $panPath = '';
        $addressPath = '';
        if($request->hasFile('photo_file')){
            $photoName = $request->file('photo_file')->getClientOriginalName();
            $photoPath = $request->file('photo_file')->storeAs('uploads', $photoName, 'public');
        }

        if($request->hasFile('pan_file')){
            $panName = $request->file('pan_file')->getClientOriginalName();
            $panPath = $request->file('pan_file')->storeAs('uploads', $panName, 'public');
        }

        if($request->hasFile('address_file')){
            $addressName = $request->file('address_file')->getClientOriginalName();
            $addressPath = $request->file('address_file')->storeAs('uploads', $addressName, 'public');            
        }

        $token1=md5(rand().$request->pan.date("H:i:s"));
        $token2=md5(rand().$request->pan.date("H:i:s"));

        $min = pow(10,4);
        $max = pow(10,4+1)-1;
        $application_id=rand($min, $max).rand();

        auth()->user()->enrolments()->create([
            'type' => $request->type,
            'certification_class' => $request->certification_class,
            'user_type' => $request->user_type,
            'validity' => $request->validity,
            'nationality' => $request->nationality,
            'ekyc_type' => $request->ekyc_type,
            'pan' => $request->pan,
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'pincode' => $request->pincode,
            'state' => $request->state,
            'city' => $request->city,
            'address' => $request->address,
            'remark' => $request->remark,
            'ekyc_pin' => $request->ekyc_pin,
            'photo_file' => $photoPath,
            'pan_file' => $panPath,
            'address_file' => $addressPath,
            'ekyc_token' => $token1,
            'dsc_token' => $token2,
            'application_id' => $application_id,
        ]);
        return redirect()->route('enrolment.authentication', [$token1, $token2]);
    }

    public function authentication($token1, $token2)
    {
        $enrolment = Enrolment::where(['ekyc_token' => $token1, 'dsc_token' => $token2])->first();
        return view('authentication', compact('token1', 'token2', 'enrolment'));
    }

    public function list()
    {
        $enrolments = auth()->user()->enrolments;
        return view('enrolment.list', compact('enrolments'));
    }

    public function dsc_list()
    {
        $enrolments = auth()->user()->enrolments;
        return view('enrolment.dsc_list', compact('enrolments'));
    }

    public function getEnrolmentByApplicationIdSteps(Request $request, $application_id)
    {
        $enrolment = Enrolment::where('application_id', $application_id)->first();
        return view('enrolment.completed-steps', compact('enrolment'));
    }

    public function getAllEnrolment(Request $request)
    {
        if($request->application_id){
          $enrolments = Enrolment::where('application_id','=',$request->application_id)->get();
        }
        else{
          $enrolments = Enrolment::get();
        }
        return view('enrolment.allList', compact('enrolments'));
    }

    public function change_status($type,$id,$status)
    {
        if($type == "list"){
            $enrol = Enrolment::find($id);
            $enrol->status = $status;
            $enrol->save();

            return redirect()->route('enrolment.all_list');
        }
        else if($type == "vid_status"){
            $enrol = Enrolment::find($id);
            $enrol->video_approval_status = $status;
            $enrol->save();

            return redirect()->route('adminhtml.dashboard_dsc');
        }
        else if($type == "sig_status"){
            $enrol = Enrolment::find($id);
            $enrol->signature_approval_status = $status;
            $enrol->save();

            return redirect()->route('adminhtml.dashboard_dsc');
        }
        else if($type == "l2_status"){
            $enrol = Enrolment::find($id);
            $enrol->l2_approval_status = $status;
            $enrol->save();

            return redirect()->route('adminhtml.dashboard_dsc');
        }
        
    }

    public function getDashboard_dsc(Request $request)
    {
          $enrolments = Enrolment::get();
          return view('adminhtml.dashboard_dsc', compact('enrolments'));
    }

    public function get_offline_kyc(Request $request, $application_id)
    {
        $enrolment = Enrolment::where(['application_id' => $application_id])->first();
        // $view = \View::make('certificate.offline_kyc',compact('enrolment'));
        // $html = $view->render();

        // $pdf_settings = \Config::get('laravel-tcpdf');
        // $tcpdf = new TCPDF($pdf_settings['page_orientation'], $pdf_settings['page_units'], $pdf_settings['page_format'], true, 'UTF-8', false);
            
        // $tcpdf->SetTitle('Enrolment');
        // $tcpdf->AddPage();
        // $tcpdf->writeHTML($html, true, false, true, false, '');
        // $tcpdf->Output('enrolment.pdf');

        // $pdf = DOMPDF::loadView('certificate.offline_kyc', $enrolment);
        // $pdf->save(storage_path().'_filename.pdf');
        // return $pdf->download('enrolment.pdf');
        return view('certificate.offline_kyc', compact('enrolment'));
    }

    public function video_verification_store(Request $request)
    {
        // $client = new \GuzzleHttp\Client(['verify' => false ]);

        // $url = "http://14.98.56.1:8000/timestamp";

        // // $myBody['hashAlgorithm'] = "SHA256";
        // // $myBody['hashedMessage'] = "a74fa57f7f80e93fe7321afbff2fb0572ce34cea206899667dfc9a695f48ecea";
        // // $myBody['certRequired'] = false;

        // $request = $client->post($url,  
        // array(
        //     'form_params' => array(
        //         'hashAlgorithm' => 'SHA256',
        //         'hashedMessage' => 'a74fa57f7f80e93fe7321afbff2fb0572ce34cea206899667dfc9a695f48ecea',
        //         'certRequired' => false
        //         )
        //     )
        // );
        $enrolment = Enrolment::where(['application_id' => $request->verification_application_id, 'birthday' => $request->verfication_dob])->first();
        $enrolment->video_file = $request->verification_video_hash;
        $enrolment->status = "0";

        if ($enrolment->save()) {
            return redirect()->back()->with('success', 'Verification saved successfully');
        } else {
            return redirect()->back()->with('failure', 'Failed to save verification');
        }
    }

    public function getEnrolmentByApplicationIdAndDob(Request $request)
    {
        $enrolment = Enrolment::where(['application_id' => $request->application_id, 'birthday' => $request->dob])->first();
        if($enrolment) {
            return response()->json($enrolment);
        } else {
            return response()->json(['message' => 'application id or dob is incorrect'], 404);
        }
    }

    public function getEnrolmentByApplicationId(Request $request)
    {
        $enrolment = Enrolment::where('application_id', $request->application_id)->first();
        return response()->json($enrolment);
    }

    // public function exportEnrolmentPdf()
    // {
    //   // Fetch all customers from database
    //   $data = Customer::get();
    //   // Send data to the view using loadView function of PDF facade
    //   $pdf = PDF::loadView('pdf.customers', $data);
    //   // If you want to store the generated pdf to the server then you can use the store function
    //   $pdf->save(storage_path().'_filename.pdf');
    //   // Finally, you can download the file using download function
    //   return $pdf->download('customers.pdf');
    // }

      public function ind(Request $request)
    {
          return view('saurav.ind');
    }

     public function send_otp(Request $request){
        $user = Enrolment::where([
            'email' => $request->email
                    ])->count();
     
        if($user){

            $userC = Enrolment::where([
            'email' => $request->email
                    ])->first();

              $otp = rand(4000,9000);
            $userC->otp = $otp;
            $userC->save();
            Mail::to($request->email)->send(new sendOtp($otp));
        
        return 1;
    }
    else{
           return 0;
    }

}

    public function verify_email(Request $request){
        $user = Enrolment::where([
            'email' => $request->email,
            'otp' => $request->otp
          ])->first();

          if($user){
              $user->email_verified = 1;
              $user->save();
              Enrolment::where('email','=',$request->email)->update(['otp' => null]);

              return 1;
          }
          else{
              return 0;
          }
    }

    public function verify_phone(Request $request){
        $user = Enrolment::where([
            'email' => $request->email,
            'otp' => $request->otp
          ])->first();

          if($user){
              $user->mobile_verified = 1;
              $user->save();
              Enrolment::where('email','=',$request->email)->update(['otp' => null]);

              return 1;
          }
          else{
              return 0;
          }
    }
  
}
