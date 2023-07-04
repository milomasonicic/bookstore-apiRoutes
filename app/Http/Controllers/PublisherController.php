<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;
use App\Http\Resources\PublisherResource;

class PublisherController extends Controller
{
    //
    public function index()
    {
        return PublisherResource::collection(Publisher::all());
    }

    public function show($id)
    {
        return new PublisherResource(Publisher::find($id));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "name"=>"required"
        ]);

        Publisher::create($data);
    }

    public function update(Request $request ,$id)
    {
       $publisher = Publisher::find($id);

       $data = $request->validate([
        "name"=>"required"
        ]);

        $publisher->update($data);
        $publisher->save();
        
    }
}
