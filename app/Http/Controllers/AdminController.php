<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public  function  create()
    {
        return view('admin.create');
    }

    public function store (Request $request)
    {
        $doctor = new Doctor();

        $image = $request->file('image');
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $image->move('doctorimage', $imagename);
        $doctor->image=$imagename;

        $doctor->name=$request->name;
        $doctor->email=$request->email;
        $doctor->phone=$request->phone;
        $doctor->room=$request->room;
        $doctor->speciality=$request->speciality;

        $doctor->save();

        return redirect()->back()->with('message', 'Doctor Added Successfully!');
    }

    public function show()
    {
        $app = Appointment::all();

        return view('admin.showappointment', compact('app'));
    }

    public function approved( $id)
    {
        $data = Appointment::find($id);

        $data->status='Approved';

        $data->save();

        return redirect()->back();
    }
    public function canceled($id)
    {
        $data = Appointment::find($id);

        $data->status="Canceled";

        $data->save();

        return redirect()->back();
    }

    public function showd()
    {
        $doctors = Doctor::all();

        return view('admin.showdoctors', compact('doctors'));
    }

    public function update($id)
    {
        $data = Doctor::find($id);

        return view('admin.update', compact('data'));
    }

    public function edit(Request $request, $id)
    {
        $data = Doctor::find($id);

        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->room=$request->room;
        $data->speciality=$request->speciality;

        $image = $request->file('image');

        if ($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move('doctorimage', $imagename);
            $data->image = $imagename;
        }

        $data->save();

        return redirect('/show.doctors')->with('message', 'Doctor Details Updated Successfully');
    }

    public  function delete($id)
    {
        $data = Doctor::find($id);

        $data->delete();

        return redirect()->back();
    }
}
