<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {

        $query = Book::with(['author', 'ratings']);

        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                ->orWhereHas('author', function ($query1) use ($request) {
                    $query1->where('name', 'like', '%' . $request->search . '%');
                });
        };
        $books = $query->withAvg('ratings', 'rating')
            ->orderByDesc('ratings_avg_rating')
            ->paginate($request->input('limit', 10));
        $books->appends(['limit' => $request->input('limit', 10)]);

        return view('books', compact('books'));
    }
}
