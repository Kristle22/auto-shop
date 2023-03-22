<div class="card">
    <div class="card-header">New Maker</div>
    <div class="card-body">
        <form method="POST" action="{{ route('maker-js.store') }}">
            <div class="form-group">
                <label>Name: </label>
                <input type="text" class="form-control" name="maker_name" value="{{ old('maker_name') }}">
                <small class="form-text text-muted">Enter new maker name.</small>
            </div>
            @csrf
            <button type="button" class="btn btn-primary">Add new</button>
        </form>

    </div>
</div>
