<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Resources\AuthorResource;

class AuthorController extends Controller
{
    //
    public function index()
    {
        return AuthorResource::collection(Author::all());
    }

    public function show($id)
    {
        $author = Author::find($id);
        return new AuthorResource($author);
    }

    public function store(Request $request) 
    {
        $data= $request->validate([
            "name"=>"required"
        ]);

        Author::create($data);
        return("dodat");
    }

    public function update(Request $request, $id)
    {
        $author= Author::find($id);

        $author->update([
            'name'=>$request->name,
        ]);

    }
}
