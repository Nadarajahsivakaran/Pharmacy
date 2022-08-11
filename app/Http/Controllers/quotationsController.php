<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\quotations;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyMail;
use App\Models\userPrescription;
use Illuminate\Support\Facades\Auth;


class quotationsController extends Controller
{

    public function storeQuotations(Request $request){

        $length = count($request->drug_id);

        for ($i=0; $i <$length ; $i++) {
            $quotations = new quotations();
            $quotations -> user_prescriptions_id  = $request -> id;
            $quotations -> drugs_id   = $request -> drug_id[$i];
            $quotations -> quantity  = $request -> drug_quantity[$i];
            $quotations -> amount  = $request -> drug_total[$i];
            $quotations -> save();

            $datas = userPrescription::find($request->id);
            $datas->status = 1;
            $datas-> save();


            Mail::to('cenadhoni1995@gmail.com')->send(new NotifyMail());
            return redirect('/get-prescription');
        }
    }


    public function userApprove(){
        $datas = userPrescription::where('user_prescriptions.status',1)
        ->where('user_prescriptions.user_id',Auth::user()->id)
        ->get();
        return view('users.uesr_quotation',compact('datas'));
    }

    public function userEdit($id){
        $quotations = quotations::where('quotations.user_prescriptions_id',$id)
        ->join('drugs','drugs.id','=','quotations.drugs_id')
        ->select('quotations.*','drugs.name')
        ->get();
        return $quotations;

    }

    public function quotationsApprove(Request $request){
        $datas = userPrescription::find($request->id);
        $datas -> status = $request->status;
        $datas -> save();
        return redirect('/user-approve');
    }

    public function pharmacyShow(){
        $datas = userPrescription::whereIn("user_prescriptions.status",[2,3])->get();
        return view('pharmacy.viewPrescrption',compact('datas'));
    }


}
