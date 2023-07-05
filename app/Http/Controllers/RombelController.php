<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rombel;
use Illuminate\Support\Facades\Session;

class RombelController extends Controller
{
    public function index()
    {
        $rombels = Rombel::all();
        return view('rombel.index', compact('rombels'));
    }

    public function create()
    {
        return view('rombel.create');
    }

    public function store(Request $request)
    {
        Rombel::create($request->all());

        Session::flash('success', 'Data is successfully saved'); 
        return redirect()->route('rombel.index');
    }

    public function edit($id)
    {
        $rombel = Rombel::find($id);

        return view('rombel.edit', compact('rombel'));
    }

    public function update($id, Request $request)
    {
        $rombel = Rombel::find($id);
        $rombel->update($request->all());

        Session::flash('success', 'Data successfully modified');

        return redirect()->route('rombel.index');
    }

    public function destroy($id)
    {
        $rombel = Rombel::find($id);
        $rombel->delete();

        Session::flash('success', 'Data deleted successfully'); 

        return redirect()->back();
    }
}
