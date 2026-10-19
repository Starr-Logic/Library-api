<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return response()->json(Author::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'AuthorName' => 'required|string|max:255',
            'Gender'     => 'nullable|string|max:10',
            'DOB'        => 'nullable|date',
            'POB'        => 'nullable|string|max:255',
            'Address'    => 'nullable|string|max:255',
            'Phone'      => 'nullable|string|max:30',
            'Email'      => 'nullable|email|max:255',
            'Photo'      => 'nullable|string|max:255',
        ]);

        return response()->json(Author::create($data), 201);
    }

    public function show($id)
    {
        return response()->json(Author::with('books')->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);

        $data = $request->validate([
            'AuthorName' => 'sometimes|required|string|max:255',
            'Gender'     => 'nullable|string|max:10',
            'DOB'        => 'nullable|date',
            'POB'        => 'nullable|string|max:255',
            'Address'    => 'nullable|string|max:255',
            'Phone'      => 'nullable|string|max:30',
            'Email'      => 'nullable|email|max:255',
            'Photo'      => 'nullable|string|max:255',
        ]);

        $author->update($data);

        return response()->json($author);
    }

    public function destroy($id)
    {
        Author::findOrFail($id)->delete();

        return response()->json(['message' => 'Author deleted successfully']);
    }
}
