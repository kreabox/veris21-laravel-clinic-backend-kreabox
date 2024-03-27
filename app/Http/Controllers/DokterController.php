<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokterController extends Controller
{
    //
    public function index(Request $request)
    {
        $dokter = DB::table('dokters')
            ->when($request->input('name'), function ($query, $doctor_name) {
                return $query->where('doctor_name', 'like', '%' . $doctor_name . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('pages.dokter.index', compact('dokter'));
    }
    public function create(){
        return view('pages.dokter.create');
    }
     //store
     public function store(Request $request)
     {
         $request->validate([
             'doctor_name' => 'required',
             'doctor_specialist' => 'required',
             'doctor_phone' => 'required',
             'doctor_email' => 'required|email',
             'sip' => 'required',
         ]);

         DB::table('dokters')->insert([
             'doctor_name' => $request->doctor_name,
             'doctor_specialist' => $request->doctor_specialist,
             'doctor_phone' => $request->doctor_phone,
             'doctor_email' => $request->doctor_email,
             'sip' => $request->sip,
         ]);

         return redirect()->route('dokter.index')->with('success', 'Doctor created successfully.');
     }
      //show
    public function show($id)
    {
        $doctor = DB::table('dokters')->where('id', $id)->first();
        return view('pages.dokter.show', compact('doctor'));
    }

    //edit
    public function edit($id)
    {
        $doctor = DB::table('dokters')->where('id', $id)->first();
        return view('pages.dokter.edit', compact('doctor'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'doctor_name' => 'required',
            'doctor_specialist' => 'required',
            'doctor_phone' => 'required',
            'doctor_email' => 'required|email',
            'sip' => 'required',
        ]);

        DB::table('dokters')->where('id', $id)->update([
            'doctor_name' => $request->doctor_name,
            'doctor_specialist' => $request->doctor_specialist,
            'doctor_phone' => $request->doctor_phone,
            'doctor_email' => $request->doctor_email,
            'sip' => $request->sip,
        ]);

        return redirect()->route('dokter.index')->with('success', 'Doctor updated successfully.');
    }

    //destroy
    public function destroy($id)
    {
        DB::table('dokters')->where('id', $id)->delete();
        return redirect()->route('dokter.index')->with('success', 'Doctor deleted successfully.');
    }
}
