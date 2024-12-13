<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    function create(Request $request)
    {
        $authors = Author::all();

        $books = [];
        if ($request->has('author_id')) {
            $books = Book::where('author_id', $request->author_id)->get();
        }
        return view('rating', compact('authors', 'books'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
        'book_id' => 'required|exists:books,id',
        'rating' => 'required|integer|min:1|max:10',
    ]);
    Rating::create($validated);
    return redirect()->route('index')->with('success', 'Rating created successfully');
    }
}
