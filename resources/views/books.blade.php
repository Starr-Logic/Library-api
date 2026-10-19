@extends('layouts.app')
@section('title', 'Books')
@section('total', $books->count())
@section('api', '/api/books')
@section('content')
<table>
    <thead>
    <tr>
        <th>ID</th><th>Title</th><th>Type</th><th>Authors</th><th>Publish Date</th>
        <th>Pages</th><th>Copies</th><th>Edition</th><th>Publisher</th><th>Source</th><th>Remark</th>
    </tr>
    </thead>
    <tbody>
    @forelse ($books as $book)
        <tr>
            <td>{{ $book->BookID }}</td>
            <td>{{ $book->BookTitle }}</td>
            <td><span class="tag">{{ $book->bookType->BookTypeName ?? '-' }}</span></td>
            <td>
                @forelse ($book->authors as $a)
                    <span class="tag">{{ $a->AuthorName }}</span>
                @empty
                    -
                @endforelse
            </td>
            <td>{{ $book->PublishDate }}</td>
            <td>{{ $book->NumOfPages }}</td>
            <td>{{ $book->NumOfCopies }}</td>
            <td>{{ $book->Edition }}</td>
            <td>{{ $book->Publisher }}</td>
            <td>{{ $book->BookSource }}</td>
            <td>{{ $book->Remark }}</td>
        </tr>
    @empty
        <tr><td colspan="11" class="empty">No books yet.</td></tr>
    @endforelse
    </tbody>
</table>
@endsection
