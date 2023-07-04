<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $books=Book::all();
        return response()->json($books);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            "title"=>"required",
            'category_id' => 'required',
            'publisher_id' => 'required',
            'author_id' => 'required'
        ]);

        Book::create($data);
        return ("book Added");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $book=Book::find($id);
        return response()->json($book);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['error' => 'Book not found'], 404);
        }
    
        $validatedData = $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'author_id' => 'required',
            'publisher_id' => 'required'
        ]);
    
        $book->fill($validatedData);
        $book->save();
    
        return response()->json($book);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $book = Book::find($id);
        $book->delete();
        return("cao");
    }

    public function search($search)
{
    $book = Book::where("title", "LIKE", "%{$search}%")->get();
    return response()->json($book);
}
}
