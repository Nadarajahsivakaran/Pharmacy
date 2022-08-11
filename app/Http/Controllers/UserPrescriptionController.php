<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\userPrescription;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Facades\DB;


class UserPrescriptionController extends Controller
{

    public function storePrescription(Request $request){

        $request->validate([
            'note' => 'required',
            'address' => 'required',
            'time' => 'required',
        ]);

        $userPrescription = new userPrescription();
        $userPrescription -> note = $request -> note;
        $userPrescription -> address = $request -> address;
        $userPrescription -> time	 = $request -> time;
        $userPrescription -> user_id = Auth::user()->id;
        $userPrescription -> status = 0;


        if ($request->hasFile('image1')) {

            $request->validate([
                'image1' => 'mimes:jpeg,bmp,png' ,

            ]);

            $image1 = $request->image1;
            $image_name1 =  time() . '.' . $image1->extension();
            $image1->move("Images", $image_name1);
            $userPrescription -> image1 = $image_name1;
        }

        if ($request->hasFile('image2')) {

            $request->validate([
                'image2' => 'mimes:jpeg,bmp,png' ,

            ]);

            $image2 = $request->file('image2');
            $image_name2 =  time() . '.' . $image2->extension();
            $image2->move("accountServiceCharge", $image_name2);
            $userPrescription -> image2 = $image_name2;
        }

        if ($request->hasFile('image3')) {

            $request->validate([
                'image3' => 'mimes:jpeg,bmp,png' ,

            ]);

            $image3 = $request->file('image3');
            $image_name3 =  time() . '.' . $image3->extension();
            $image3->move("accountServiceCharge", $image_name3);
            $userPrescription -> image3 = $image_name3;
        }

        if ($request->hasFile('image4')) {

            $request->validate([
                'image4' => 'mimes:jpeg,bmp,png' ,

            ]);

            $image4 = $request->file('image4');
            $image_name4 =  time() . '.' . $image4->extension();
            $image4->move("accountServiceCharge", $image_name4);
            $userPrescription -> image4 = $image_name4;
        }

        if ($request->hasFile('image5')) {

            $request->validate([
                'image5' => 'mimes:jpeg,bmp,png' ,

            ]);

            $image5 = $request->file('image5');
            $image_name5 =  time() . '.' . $image5->extension();
            $image5->move("accountServiceCharge", $image_name5);
            $userPrescription -> image5 = $image_name5;
        }

        $userPrescription ->save();
        return redirect('/view-prescription')->with('success', 'Successfully Recordered');

    }

    public function getPrescription(){
        $datas = userPrescription::where('user_prescriptions.status',0)->get();
        return view('pharmacy.prescription',compact('datas'));
    }


    public function createQuotations($id){
        $data = userPrescription::find($id);
        $drugs = DB::table('drugs')->get();
        return view('pharmacy.quotations',compact('data','drugs'));
    }

    public function viewPrescription(){
        $id = Auth::user()->id;
        $datas = userPrescription::where('user_prescriptions.user_id',$id)
        ->whereNotIn('user_prescriptions.status',[1])
        ->get();
        return view('users.view_prescription',compact('datas'));
    }

}
