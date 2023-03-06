@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Maker edit</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('maker.update', $maker) }}">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="maker_name" class="form-control"
                                    value="{{ old('maker_name', $maker->name) }}">
                                <small class="form-text text-muted">Enter new maker name.</small>
                            </div>
                            @csrf
                            <button type="submit" class="btn btn-info">Update maker</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title')
    Maker edit
@endsection
