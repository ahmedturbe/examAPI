<?php

namespace App\Http\Controllers\Api\V1;


use App\Models\Movie;
use App\Models\Category;
use App\Models\Favorite;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Movie::with('category','actors')->sort()->paginate(3);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovieRequest $request)
    {
        //Receives a movie with category and actors in a json array
        /*
        {
            "name": "Categoryy-Two",
            "slug": "Categoryy-Two",
            "category_id":"1",
            "description":"To convert a model to JSON, you should use the toJson method. Like toArray, the toJson method is recursive, so all attributes and relations will be converted to JSON. You may also specify any JSON encoding options that are supported by",
            "actors": ["1","2","3"]
        }
        */
        $movie = Movie::create($request->validated());
        $movie->actors()->attach($request->actors);
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        return Movie::where('id', $movie->id)->with('category','actors')->get()->toJson(JSON_PRETTY_PRINT);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        //
    }

}
