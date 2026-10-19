@extends('layouts.app')
@section('title', 'Book Authors')
@section('total', $rows->count())
@section('api', '/api/book-authors')
@section('content')
<table>
    <thead>
    <tr><th>Book ID</th><th>Book Title</th><th>Author ID</th><th>Author Name</th><th>Author Date</th><th>Remark</th></tr>
    </thead>
    <tbody>
    @forelse ($rows as $row)
        <tr>
            <td>{{ $row->BookID }}</td>
            <td>{{ $row->book->BookTitle ?? '-' }}</td>
            <td>{{ $row->AuthorID }}</td>
            <td>{{ $row->author->AuthorName ?? '-' }}</td>
            <td>{{ $row->AuthorDate }}</td>
            <td>{{ $row->Remark }}</td>
        </tr>
    @empty
        <tr><td colspan="6" class="empty">No book authors yet.</td></tr>
    @endforelse
    </tbody>
</table>
@endsection
