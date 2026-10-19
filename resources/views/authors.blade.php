@extends('layouts.app')
@section('title', 'Authors')
@section('total', $authors->count())
@section('api', '/api/authors')
@section('content')
<table>
    <thead>
    <tr>
        <th>ID</th><th>Name</th><th>Gender</th><th>DOB</th><th>POB</th>
        <th>Address</th><th>Phone</th><th>Email</th><th>Photo</th><th>Books</th>
    </tr>
    </thead>
    <tbody>
    @forelse ($authors as $author)
        <tr>
            <td>{{ $author->AuthorID }}</td>
            <td>{{ $author->AuthorName }}</td>
            <td>{{ $author->Gender }}</td>
            <td>{{ $author->DOB }}</td>
            <td>{{ $author->POB }}</td>
            <td>{{ $author->Address }}</td>
            <td>{{ $author->Phone }}</td>
            <td>{{ $author->Email }}</td>
            <td>{{ $author->Photo }}</td>
            <td>
                @forelse ($author->books as $b)
                    <span class="tag">{{ $b->BookTitle }}</span>
                @empty
                    -
                @endforelse
            </td>
        </tr>
    @empty
        <tr><td colspan="10" class="empty">No authors yet.</td></tr>
    @endforelse
    </tbody>
</table>
@endsection
