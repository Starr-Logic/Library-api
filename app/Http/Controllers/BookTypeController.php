<?php

namespace App\Http\Controllers;

use App\Models\BookType;
use Illuminate\Http\Request;

class BookTypeController extends Controller
{
    public function index()
    {
        return response()->json(BookType::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'BookTypeName' => 'required|string|max:255',
        ]);

        return response()->json(BookType::create($data), 201);
    }

    public function show($id)
    {
        return response()->json(BookType::with('books')->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $bookType = BookType::findOrFail($id);

        $data = $request->validate([
            'BookTypeName' => 'required|string|max:255',
        ]);

        $bookType->update($data);

        return response()->json($bookType);
    }

    public function destroy($id)
    {
        BookType::findOrFail($id)->delete();

        return response()->json(['message' => 'Book type deleted successfully']);
    }
}
