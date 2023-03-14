<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Maker;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        

        $makers = Maker::all();

        if ($request->sort) {
            if ('name' == $request->sort && 'asc' == $request->sort_dir) {
                $cars = Car::orderBy('name')->get();
            }
            else if ('name' == $request->sort && 'desc' == $request->sort_dir) {
                $cars = Car::orderBy('name', 'desc')->get();
            }
            elseif ('plate' == $request->sort && 'asc' == $request->sort_dir) {
                $cars = Car::orderBy('plate')->get();
            }
            else if ('plate' == $request->sort && 'desc' == $request->sort_dir) {
                $cars = Car::orderBy('plate', 'desc')->get();
            }
            else {
                $cars = Car::all();  
            }
        }
        else if ($request->filter && 'maker' == $request->filter) {
            $cars = Car::where('maker_id', $request->maker_id)->get();
        }
        else if ($request->search && 'all' == $request->search) {

            $words = explode(' ', $request->s);
            if (count($words) == 1) {
            $cars = Car::where('name', 'like', '%'.$request->s.'%')
            ->orWhere('plate', 'like', '%'.$request->s.'%')->get();
            } else {
                $cars = Car::where(function($query) use ($words) {
                    $query->where('name', 'like', '%'.$words[0].'%')
                    ->orWhere('plate', 'like', '%'.$words[0].'%');
                    })
                ->where(function($query) use ($words) {
                $query->where('name', 'like', '%'.$words[1].'%')
                ->orWhere('plate', 'like', '%'.$words[1].'%');
                })->get();
            }
        }
        else {
            $cars = Car::all(); 
        }
    
        return view('car.index', [
            'cars' => $cars,
            'sortDirection' => $request->sort_dir ?? 'asc',
            'makers' => $makers,
            'makerId' => $request->maker_id ?? '0',
            's' => $request->s ?? ''
        ]);

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
