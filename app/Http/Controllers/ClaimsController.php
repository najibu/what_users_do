<?php

namespace App\Http\Controllers;

use App\Claim;
use App\Defendant;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ClaimsController extends Controller
{
    public function index() {
        $claims = Claim::orderBy('id','asc')->get();
        return json_encode($claims);
    }
    
    public function store(Request $request) {
        $retVal = [
            'success' => null,
            'message' => '',
            'data' => []
        ];

        $validator = \Illuminate\Validation\Validator::make($request->all(),[
            'patient' => 'required|max:255',
        ]);
        if ($validator->fails()){
            $retVal['success'] = false;
            $retVal['message'] = 'An error occurred';
        } else {
            // Save the claim
            $retVal['success'] = true;
            $retVal['message'] = 'Claim Saved';
            
            $claim = new Claim;
            $claim->patient = $request->input('patient');
            $claim->save();
            $claimId = $claim->id;
            $retVal['data'] = [
                'claimId' => $claimId,
            ];

            $defendants = $request->input('defendants',[]);
            foreach ($defendants as $name){
                $defendant = new Defendant;
                $defendant->claim_id = $claimId;
                $defendant->defendant = $name;
                $defendant->save();
            }
        }
       
        return json_encode($retVal);
    }
    
    public function destroy($id) {
    
        $claim = Claim::findOrFail($id);
        $claim->delete();
        return json_encode([
            'success' => true,
            'message' => 'Claim Deleted'
        ]);
    }
}
