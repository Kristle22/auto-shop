<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Maker;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::orderBy('name')->get();
        return view('car.index', ['cars' => $cars]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $makers = Maker::orderBy('name')->get();
        return view('car.create', ['makers' => $makers]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarRequest $request)
    {
        $car = new Car;
        $car->name = $request->car_name;
        $car->plate = $request->car_plate;
        $car->about = $request->car_about;
        $car->maker_id = $request->maker_id;
        $car->save();
        return redirect()->route('car.index')->with('success_message', 'Naujas automobilis sekmingai įrašytas.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        $makers = Maker::orderBy('name')->get();
        return view('car.edit', compact('car'), ['makers' => $makers]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCarRequest  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        $car->name = $request->car_name;
        $car->plate = $request->car_plate;
        $car->about = $request->car_about;
        $car->maker_id = $request->maker_id;
        $car->save();
        return redirect()->route('car.index')->with('success_message', 'Automobilio info sekmingai atnaujinta.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
       
    $car->delete();
    return redirect()->route('car.index')->with('success_message', 'Automobilis sekmingai ištrintas.');

    }
}
