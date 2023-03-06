@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Makers list</div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($makers as $maker)
                                <li class="list-group-item">
                                    <div class="row-item">
                                        <div class="row-item__basic">
                                            <span>{{ $maker->name }}</span>
                                            @if ($maker->getCars->count())
                                                <small>Works on {{ $maker->getCars->count() }} cars.</small>
                                            @else
                                                <small>Currently has no cars.</small>
                                            @endif
                                        </div>
                                        <div class="row-item__btns">
                                            <a href="{{ route('maker.edit', $maker) }}" class="btn btn-info">Edit</a>
                                            <form method="POST" action="{{ route('maker.destroy', $maker) }}">
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
    Makers list
@endsection
