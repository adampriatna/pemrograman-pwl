<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->search;
        $kategori = $request->kategori;

        $books = Book::with('category')
            ->when($keyword, function ($query) use ($keyword) {
                $query->where(function ($q) use ($keyword) {
                    $q->where('title', 'LIKE', "%{$keyword}%")
                      ->orWhere('author', 'LIKE', "%{$keyword}%");
                });
            })
            ->when($kategori, function ($query) use ($kategori) {
                $query->where('category_id', $kategori);
            })
            ->get();

        $categories = Category::orderBy('name')->get();

        return view('books.index', compact(
            'books',
            'categories',
            'keyword',
            'kategori'
        ));
    }
}