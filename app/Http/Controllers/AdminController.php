<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Doctor;

class AdminController extends Controller
{
public function addview(){

        return view('admin.add_doctor');
}
public function upload(Request $request){
        $doctor = new doctor();
        $image = $request->file;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->file ->move('doctorimage',$imagename);
        $doctor->image = $imagename;
        $doctor->name = $request->name;
        $doctor->phone = $request->number;
        $doctor->room= $request->room;
        $doctor->speciality= $request->speciality;
        $doctor->save();
        return redirect()->back()->with('message', 'Doctor has successfully');


}

public function showappointment(){

        $data = appointment::all();

        return view('admin.showappointment', compact('data'));
}
public function approved($id){
        $data = appointment::find($id);
        $data->status = 'approved' ;
        $data->save();
        return redirect()->back();
}
public function canceled($id){
    $data = appointment::find($id);
    $data->status = 'canceled' ;
    $data->save();
    return redirect()->back();
}
public function showdoctor(){
        $data = doctor::all();
        return view('admin.showdoctor', compact('data'));
}
public function deletedoctor($id){

        $data = doctor::find($id);
        $data->delete();
        return redirect()->back();
}
public function updatedoctor($id){

    $data = doctor::find($id);


        return view('admin.update_doctor', compact('data'));

}
  public function editdoctor(Request $request, $id){

        $doctor = doctor::find($id);
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->Speciality = $request->Speciality;
        $doctor->room = $request->room;

        $image = $request->file;

        if ($image) {


            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->file->move('doctorimage', $imagename);
            $doctor->image = $imagename;
        }
        $doctor->save();
        return redirect()->back()->with('message', 'Doctor Details updated successfully');
  }
}
