<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Rombel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        // $rombel_id = $request->rombel_id;

        $students = Student::all();
        return view('student.index', compact('students'));
    }

    public function create()
    {
        $rombel = Rombel::all();
        return view('student.create', compact("rombel"));
    }

    public function store(Request $request)
    {
        Student::create($request->all());

        Session::flash('success', 'Data is successfully saved'); 
        return redirect()->route('student.index');
    }

    public function edit($id)
    {
        $rombel = Rombel::all();
        $siswa = Student::findOrFail($id);

        return view('student.edit', compact('siswa','rombel'));
    }

    public function update($id, Request $request)
    {
        $siswa = Student::find($id);
        $siswa->update($request->all());
         
        Session::flash('success', 'Data successfully modified'); 

        return redirect()->route('student.index');
    }

    public function destroy($id)
    {
        $siswa = Student::find($id);
        $siswa->delete();
         
        Session::flash('success', 'Data deleted successfully'); 

        return redirect()->back();
    }

}
