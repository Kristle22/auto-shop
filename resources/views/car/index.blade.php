@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Cars list</h3>
                        <form action="{{ route('car.index') }}" method="get">
                            <fieldset>
                                <legend>Sort</legend>
                                <div class="block">
                                    <button type="submit" class="btn btn-info" name="sort" value="name">Name</button>
                                    <button type="submit" class="btn btn-info" name="sort" value="plate">Plate</button>
                                </div>
                                <div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sort_dir" id="_1"
                                            value="asc" @if ('desc' != $sortDirection) checked @endif>
                                        <label class="form-check-label" for="_1">
                                            ASC
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sort_dir" id="_2"
                                            value="desc" @if ('desc' == $sortDirection) checked @endif>
                                        <label class="form-check-label" for="_2">
                                            DESC
                                        </label>
                                    </div>
                                </div>
                                <div class="block">
                                    <a href="{{ route('car.index') }}" class="btn btn-warning">Reset</a>
                                </div>
                            </fieldset>
                        </form>
                        <form action="{{ route('car.index') }}" method="get">
                            <fieldset>
                                <legend>Filter</legend>
                                <div class="form-group">
                                    <select class="form-control" name="maker_id">
                                        <option value="0" disabled selected>Select Maker</option>
                                        @foreach ($makers as $maker)
                                            <option value="{{ $maker->id }}"
                                                @if ($makerId == $maker->id) selected @endif>{{ $maker->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <small class="form-text text-muted">Select the car maker from the list.</small>
                                </div>
                                <div class="block">
                                    <button type="submit" class="btn btn-info" name="filter"
                                        value="maker">Filter</button>
                                    <a href="{{ route('car.index') }}" class="btn btn-warning">Reset</a>
                                </div>
                            </fieldset>
                        </form>
                        <form action="{{ route('car.index') }}" method="get">
                            <fieldset>
                                <legend>Search</legend>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="s" value="{{ $s }}"
                                        placeholder="Search">
                                    <small class="form-text text-muted">Search in our Auto Parduotuvė.</small>
                                </div>
                                <div class="block">
                                    <button type="submit" class="btn btn-info" name="search"
                                        value="all">Search</button>
                                    <a href="{{ route('car.index') }}" class="btn btn-warning">Reset</a>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="m-3">
                            {{ $cars->links() }}
                        </div>

                        <ul class="list-group">
                            @foreach ($cars as $car)
                                <li class="list-group-item">
                                    <div class="row-item">
                                        <div class="row-item__basic">
                                            <span><b>Brand:</b> {{ $car->name }} <b>Plate:</b> {{ $car->plate }}
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
                        <div class="m-3">
                            {{ $cars->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title')
    Cars list
@endsection
