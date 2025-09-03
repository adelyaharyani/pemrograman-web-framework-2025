@extends('layout')

@section('content')
<div class="card">
    <div class="card-header"><h2>Tambah Task</h2></div>

    <form action="{{ route('tasks.store') }}" method="POST" class="form">
        @csrf
        <label class="field">
            <span>Judul <sup>*</sup></span>
            <input type="text" name="title" value="{{ old('title') }}" required>
        </label>

        <label class="field">
            <span>Deskripsi</span>
            <textarea name="description" rows="4">{{ old('description') }}</textarea>
        </label>

        <label class="checkbox">
            <input type="checkbox" name="is_done" value="1" {{ old('is_done') ? 'checked' : '' }}>
            <span>Tandai selesai</span>
        </label>

        <div class="form-actions">
            <a href="{{ route('tasks.index') }}" class="btn btn-outline">Batal</a>
            <button class="btn">Simpan</button>
        </div>
    </form>
</div>
@endsection
