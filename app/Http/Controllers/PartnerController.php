<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

use App\Partner;

class PartnerController extends Controller
{
    public function create()
    {
        return view('partner.create');
    }

    public function store(Request $request)
    {
        if (Gate::allows('add-partner')) {
            $proofPath = '';
            if($request->hasFile('proof_file')){
                $proofName = $request->file('proof_file')->getClientOriginalName();
                $proofPath = $request->file('proof_file')->storeAs('uploads', $proofName, 'public');
            }
            $partner = Partner::create([
                'type' => $request->type,
                'pan' => $request->pan,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'pincode' => $request->pincode,
                'state' => $request->state,
                'gst_no' => $request->gst_no,
                'org_name' => $request->org_name,
                'proof_file' => $proofPath,
                'comment' => $request->comment,
            ]);
            if($partner) {
                return redirect()->back()->with('success', 'Partner created successfully');
            } else {
                return redirect()->back()->with('failure', 'Failed to create partner');
            }
        } else {
            // abort( response('Unauthorized', 401) );
            abort(401);
        }
    }
}
