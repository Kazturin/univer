<?php

namespace App\Http\Controllers;

use App\Models\Award;
use App\Models\Tutor;
use App\Models\TutorAward;
use Illuminate\Http\Request;

class TutorAwardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
//        $awards = Award::all();

        $tutor = Tutor::select('TutorID','lastname','firstname','patronymic')->where('TutorID',$request->tutor_id)->first();

        return view('tutor-award.index',compact(['tutor']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TutorAward $tutorAward)
    {
        $tutorAward->delete();

        return redirect()->route('tutor-award.index',['tutor_id' => $tutorAward->tutorId])->with('success', 'Успешно удален');
    }
}
