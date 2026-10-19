@extends('layouts.app')
@section('title', 'Book Types')
@section('total', $types->count())
@section('api', '/api/book-types')
@section('content')
<table>
    <thead>
    <tr><th>ID</th><th>Book Type Name</th><th>Number of Books</th></tr>
    </thead>
    <tbody>
    @forelse ($types as $type)
        <tr>
            <td>{{ $type->BookTypeID }}</td>
            <td>{{ $type->BookTypeName }}</td>
            <td>{{ $type->books_count }}</td>
        </tr>
    @empty
        <tr><td colspan="3" class="empty">No book types yet.</td></tr>
    @endforelse
    </tbody>
</table>
@endsection
