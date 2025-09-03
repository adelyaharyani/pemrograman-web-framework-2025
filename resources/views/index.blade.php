@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Daftar Task</h2>
        <form method="GET" action="{{ route('tasks.index') }}" class="search">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari judul... (opsional)" />
        </form>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Dibuat</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @forelse($tasks as $task)
                <tr class="{{ $task->is_done ? 'row-done' : '' }}">
                    <td class="title-cell">{{ $task->title }}</td>
                    <td class="desc-cell">{{ $task->description }}</td>
                    <td>
                        @if($task->is_done)
                            <span class="badge badge-done">Selesai</span>
                        @else
                            <span class="badge badge-pending">Belum</span>
                        @endif
                    </td>
                    <td>{{ $task->created_at->format('d/m/Y H:i') }}</td>
                    <td class="actions">
                        <form action="{{ route('tasks.done', $task->id) }}" method="POST" class="inline">
                            @csrf @method('PATCH')
                            <button class="btn btn-outline">
                                {{ $task->is_done ? 'Undo' : 'Tandai Selesai' }}
                            </button>
                        </form>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn">Edit</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline"
                              onsubmit="return confirm('Hapus task ini?');">
                            @csrf @method('DELETE')
                            <button class="btn danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="empty">Belum ada task. Klik “+ Tambah Task”.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination">
        {{ $tasks->withQueryString()->links() }}
    </div>
</div>
@endsection
