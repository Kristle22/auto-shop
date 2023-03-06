@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cars list</div>

                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($cars as $car)
                                <li class="list-group-item">
                                    <div class="row-item">
                                        <div class="row-item__basic">
                                            <span>{{ $car->name }} {{ $car->plate }}
                                            </span>
                                            <small>
                                                {{ $car->getMaker->name }}
                                            </small>
                                            <div>
                                                {!! $car->about !!}
                                            </div>
                                        </div>
                                        <div class="row-item__btns">
                                            <a href="{{ route('car.edit', $car) }}" class="btn btn-info">Edit</a>
                                            <form method="POST" action="{{ route('car.destroy', $car) }}">
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title')
    Cars list
@endsection
