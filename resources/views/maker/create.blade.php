@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">New Maker</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('maker.store') }}">
                            <div class="form-group">
                                <label>Name: </label>
                                <input type="text" class="form-control" name="maker_name" value="{{ old('maker_name') }}">
                                <small class="form-text text-muted">Enter new maker name.</small>
                            </div>
                            @csrf
                            <button type="submit" class="btn btn-primary">Add new</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title')
    New Maker
@endsection
