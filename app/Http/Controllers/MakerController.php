<?php

namespace App\Http\Controllers;

use App\Models\Maker;
use App\Http\Requests\StoreMakerRequest;
use App\Http\Requests\UpdateMakerRequest;

class MakerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $makers = Maker::orderBy('name')->get();
        return view('maker.index', ['makers' => $makers]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maker.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMakerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMakerRequest $request)
    {
        $maker = new Maker;
        $maker->name = $request->maker_name;
        $maker->save();
        return redirect()->route('maker.index')->with('success_message', 'Naujas gamintojas sekmingai įrašytas.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maker  $maker
     * @return \Illuminate\Http\Response
     */
    public function show(Maker $maker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Maker  $maker
     * @return \Illuminate\Http\Response
     */
    public function edit(Maker $maker)
    {
        return view('maker.edit', ['maker' => $maker]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMakerRequest  $request
     * @param  \App\Models\Maker  $maker
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMakerRequest $request, Maker $maker)
    {
        $maker->name = $request->maker_name;
        $maker->save();
        return redirect()->route('maker.index')->with('success_message', 'Gamintojas sekmingai pakeistas.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maker  $maker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maker $maker)
    {
        if($maker->getCars->count()){
            return redirect()->route('maker.index')->with('info_message', 'Trinti negalima, nes turi automobiliu.');
        }
        $maker->delete();
        return redirect()->route('maker.index')->with('success_message', 'Gamintojas sekmingai ištrintas.');
 
    }
}
