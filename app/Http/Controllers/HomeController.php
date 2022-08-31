<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
//    public function index()
//    {
//        return view('home');
//    }

    public function redirect()
    {
        if (Auth::id())
        {
            if (Auth::user()->usertype == '0')
            {
                $doctor = Doctor::all();
                return view('user.home', compact('doctor'));
            }

            else
            {
                return view('admin.home');
            }
        }
        else
        {
            return redirect()-back();
        }
    }

    public function index()
    {
        if (Auth::id())
        {
            return redirect('home');
        }
        else
        {
            $doctor = Doctor::all();

            return view('user.home', compact('doctor'));
        }
    }

    public function create(Request $request)
    {
        $data = new Appointment();

        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->doctor=$request->doctor;
        $data->date=$request->date;
        $data->message=$request->message;
        $data->status='In Progress';

        if (Auth::id())
        {
            $data->user_id=Auth::user()->id;
        }

        $data->save();

        return redirect()->back()->with('message', 'Appointment created successfully');
    }

    public function show()
    {
        if (Auth::id())
        {
            $userid = Auth::user()->id;
            $app = Appointment::where('user_id', $userid)->get();

            return view('user.showappointment', compact('app'));
        }

        else
        {
            return redirect()->back();
        }
    }

    public function cancel($id)
    {
        $data = Appointment::find($id);

        $data->delete();

        return redirect()->back();
    }
}
