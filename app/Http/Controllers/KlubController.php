<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Club;   
class KlubController extends Controller
{
    public function create()
    {
        return view('klub.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:clubs',
            'city' => 'required',
        ]);

        Club::create($request->all());

        return redirect()->route('klub.create')->with('success', 'Data klub berhasil disimpan.');
    }

}
