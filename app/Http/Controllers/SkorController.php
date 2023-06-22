<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Club;
use App\Score;
class SkorController extends Controller
{
    public function create()
    {

        $klubs = Club::pluck('name', 'id');
        return view('skor.create', compact('klubs'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'home_club_id' => 'required|different:away_club_id',
            'away_club_id' => 'required|different:home_club_id',
            'home_score' => 'required|integer',
            'away_score' => 'required|integer',
        ]);
        
        
        Score::create($request->all());

        return redirect()->route('skor.create')->with('success', 'Skor pertandingan berhasil disimpan.');
    }
    public function createMult()
    {
        $clubs = Club::all();
        return view('skor.create2', compact('clubs'));
    }
    public function storeMult(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'home_club' => 'required|array',
            'home_club.*' => 'required|distinct',
            'away_club' => 'required|array',
            'away_club.*' => 'required|distinct',
            'home_score' => 'required|array',
            'home_score.*' => 'required|integer',
            'away_score' => 'required|array',
            'away_score.*' => 'required|integer',
        ]);

        $homeClubs = $validatedData['home_club'];
        $awayClubs = $validatedData['away_club'];
        $homeScores = $validatedData['home_score'];
        $awayScores = $validatedData['away_score'];

        // dd($homeClubs);

        // Simpan data skor ke dalam database
        for ($i = 0; $i < count($homeClubs); $i++) {
            $score = new Score();
            $score->home_club_id = $request->home_club[$i];
            $score->away_club_id =  $request->away_club[$i];
            $score->home_score = $request->home_score[$i];
            $score->away_score = $request->away_score[$i];
            $score->save();
        }

        // Kembali ke halaman klasemen atau tampilkan pesan sukses
        return redirect()->route('klasemen')->with('success', 'Data skor berhasil disimpan.');
    }
}
