@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Car edit</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('car.update', $car) }}" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="car_name"
                                    value="{{ old('car_name', $car->name) }}">
                                <small class="form-text text-muted">Enter car Name.</small>
                            </div>
                            <div class="form-group">
                                <label>Plate</label>
                                <input type="text" class="form-control" name="car_plate"
                                    value="{{ old('car_plate', $car->plate) }}">
                                <small class="form-text text-muted">Enter car Plate.</small>
                            </div>
                            <div class="form-group">
                                <label>About</label>
                                <textarea class="form-control" name="car_about">{{ old('car_about', $car->about) }}</textarea>
                                <small class="form-text text-muted">About the car.</small>
                            </div>
                            <div class="form-group">
                                <label>Photo</label>
                                <div class="img mb-2">
                                    @if ($car->photo)
                                        <img src="{{ $car->photo }}" alt="{{ $car->name }}">
                                    @else
                                        <img src="{{ asset('img/no-img.png') }}" alt="{{ $car->name }}">
                                    @endif
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" class="form-check-input me-1" name="car_photo_deleted"
                                        id="df">
                                    <label for="df">Delete photo</label>
                                </div>
                                <input type="file" class="form-control" name="car_photo">
                                <small class="form-text text-muted">Car image.</small>
                            </div>
                            <div class="form-group">
                                <label>Maker</label>
                                <select class="form-control" name="maker_id">
                                    @foreach ($makers as $maker)
                                        <option value="{{ $maker->id }}"
                                            @if (old('maker_id', $car->maker_id) == $maker->id) selected @endif>
                                            {{ $maker->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">Select the maker from the list.</small>
                            </div>
                            @csrf
                            <button type="submit" class="btn btn-primary">Update car info</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title')
    Car edit
@endsection
