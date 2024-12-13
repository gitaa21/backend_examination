<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
   public function index()
   {
      $authors = Author::withCount(['books', 'ratings as voter' => function ($query) {
         $query->where('rating', '>', 5);
      }])
         ->orderByDesc('voter')
         ->paginate(10);

      return view('famousAuthor', compact('authors'));
   }
}
