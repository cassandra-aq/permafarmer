<?php

namespace App\Http\Controllers\Crud;

use App\Season;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seasons = Season::all();
        return  view('seasons.index', ['seasons' => $seasons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('seasons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $season=
        DB::transaction(function () use($request){
            (new Season)->fill($request->all())->saveOrFail();
        });
        return redirect()->route('seasons.index', ['season'=>$season])->with('success','La saison a bien été ajoutée.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
//    public function show()
//    {
//        $seasons = Season::all();
//        return  view('seasons.index', ['seasons' => $seasons]);
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function edit(Season $season)
    {
        return view('seasons.edit', compact('season'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Season $season)
    {
        DB::transaction(function () use ($request, $season) {
            $season = $season->fill($request->all())->saveOrFail();
        });
        return redirect()->route('seasons.index')->with('success','La saison a bien été modifiée.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function destroy(Season $season)
    {
        $season->forcedelete();
        return redirect()->route('seasons.index')->with('success', 'La saison a bien été supprimée.');
    }
}
