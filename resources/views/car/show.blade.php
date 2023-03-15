@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><b>{{ $car->name }}</b> <small>Maker: {{ $car->getMaker->name }}</small>
                    </div>
                    <div class="card-body">
                        <div class="item-container">
                            <div class="item-container__basic">
                                <p> <b> {{ $car->name }}</b>
                                <p>
                                <p>Plate: <b>{{ $car->plate }}</b></p>
                            </div>
                        </div>
                        <div class="item-container__about">
                            {!! $car->about !!}
                        </div>
                        <a href="{{ route('car.edit', $car) }}" class="btn btn-info mt-2">Edit</a>
                        <a href="{{ route('car.pdf', $car) }}" class="btn btn-info mt-2">PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title')
    {{ $car->name }}-{{ $car->getmaker->name }}
@endsection
