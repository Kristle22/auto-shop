<div class="card">
    <div class="card-header">Makers list</div>
    <div class="card-body">
        <div class="m-3">
            {{ $makers->links() }}
        </div>
        <ul class="list-group">
            @foreach ($makers as $maker)
                <li class="list-group-item">
                    <div class="row-item">
                        <div class="row-item__basic">
                            <span>{{ $maker->name }}</span>
                            @if ($maker->getCars->count())
                                <small>Has produced {{ $maker->getCars->count() }} cars.</small>
                            @else
                                <small>Currently has no cars.</small>
                            @endif
                        </div>
                        <div class="row-item__btns">
                            <a href="{{ route('maker-js.index') }}#edit|{{ $maker->id }}"
                                class="btn btn-info link-btn">Edit</a>
                            <form method="POST" action="{{ route('maker-js.destroy', $maker) }}">
                                <button type="button" class="btn btn-danger">Delete</button>
                                @csrf
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="m-3">
            {{ $makers->links() }}
        </div>
    </div>
</div>
