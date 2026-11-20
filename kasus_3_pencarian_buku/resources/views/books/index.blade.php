@extends('layouts.app')

@section('title', 'Pencarian Buku')

@section('content')
    <h1 class="h3 mb-3">Pencarian dan Filter Buku</h1>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ url('/books') }}" method="GET" class="row g-2 align-items-center">

                <div class="col-md-5">
                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Cari judul atau penulis..."
                        value="{{ $keyword }}"
                    >
                </div>

                <div class="col-md-4">
                    <select name="kategori" class="form-select">
                        <option value="">Semua kategori</option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $kategori == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        Cari
                    </button>

                    <a href="{{ url('/books') }}" class="btn btn-outline-secondary">
                        Reset
                    </a>
                </div>

            </form>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Kategori</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>
                                <span class="badge bg-secondary">
                                    {{ $book->category->name ?? 'Tanpa Kategori' }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted py-4">
                                Buku tidak ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection