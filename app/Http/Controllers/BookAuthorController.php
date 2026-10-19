<?php

namespace App\Http\Controllers;

use App\Models\BookAuthor;
use Illuminate\Http\Request;

class BookAuthorController extends Controller
{
    // tblBookAuthor uses a composite key (BookID + AuthorID)
    private function findOrFail($bookId, $authorId)
    {
        return BookAuthor::where('BookID', $bookId)
            ->where('AuthorID', $authorId)
            ->firstOrFail();
    }

    public function index()
    {
        return response()->json(BookAuthor::with(['book', 'author'])->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'BookID'     => 'required|exists:tblBook,BookID',
            'AuthorID'   => 'required|exists:tblAuthor,AuthorID',
            'AuthorDate' => 'nullable|date',
            'Remark'     => 'nullable|string',
        ]);

        $exists = BookAuthor::where('BookID', $data['BookID'])
            ->where('AuthorID', $data['AuthorID'])
            ->exists();

        if ($exists) {
            return response()->json(['message' => 'This book/author pair already exists'], 422);
        }

        BookAuthor::create($data);

        return response()->json($this->findOrFail($data['BookID'], $data['AuthorID']), 201);
    }

    public function show($bookId, $authorId)
    {
        $row = BookAuthor::with(['book', 'author'])
            ->where('BookID', $bookId)
            ->where('AuthorID', $authorId)
            ->firstOrFail();

        return response()->json($row);
    }

    public function update(Request $request, $bookId, $authorId)
    {
        $this->findOrFail($bookId, $authorId);

        $data = $request->validate([
            'AuthorDate' => 'nullable|date',
            'Remark'     => 'nullable|string',
        ]);

        BookAuthor::where('BookID', $bookId)
            ->where('AuthorID', $authorId)
            ->update($data);

        return response()->json($this->findOrFail($bookId, $authorId));
    }

    public function destroy($bookId, $authorId)
    {
        $this->findOrFail($bookId, $authorId);

        BookAuthor::where('BookID', $bookId)
            ->where('AuthorID', $authorId)
            ->delete();

        return response()->json(['message' => 'Book author deleted successfully']);
    }
}
