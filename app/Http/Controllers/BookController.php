<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return response()->json(Book::with(['bookType', 'authors'])->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'BookTitle'   => 'required|string|max:255',
            'BookTypeID'  => 'required|exists:tblBookType,BookTypeID',
            'PublishDate' => 'nullable|date',
            'NumOfPages'  => 'nullable|integer|min:0',
            'NumOfCopies' => 'nullable|integer|min:0',
            'Edition'     => 'nullable|string|max:255',
            'Publisher'   => 'nullable|string|max:255',
            'BookSource'  => 'nullable|string|max:255',
            'Remark'      => 'nullable|string',
        ]);

        return response()->json(Book::create($data), 201);
    }

    public function show($id)
    {
        return response()->json(Book::with(['bookType', 'authors'])->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $data = $request->validate([
            'BookTitle'   => 'sometimes|required|string|max:255',
            'BookTypeID'  => 'sometimes|required|exists:tblBookType,BookTypeID',
            'PublishDate' => 'nullable|date',
            'NumOfPages'  => 'nullable|integer|min:0',
            'NumOfCopies' => 'nullable|integer|min:0',
            'Edition'     => 'nullable|string|max:255',
            'Publisher'   => 'nullable|string|max:255',
            'BookSource'  => 'nullable|string|max:255',
            'Remark'      => 'nullable|string',
        ]);

        $book->update($data);

        return response()->json($book);
    }

    public function destroy($id)
    {
        Book::findOrFail($id)->delete();

        return response()->json(['message' => 'Book deleted successfully']);
    }
}
