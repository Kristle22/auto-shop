<div class="card">
    <div class="card-header">Maker edit</div>

    <div class="card-body">
        <form method="POST" action="{{ route('maker-js.update', $maker) }}">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="maker_name" class="form-control" value="{{ old('maker_name', $maker->name) }}">
                <small class="form-text text-muted">Enter new maker name.</small>
            </div>
            @csrf
            <button type="button" class="btn btn-info">Update maker</button>
        </form>

    </div>
</div>
