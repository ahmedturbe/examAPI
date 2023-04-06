<?php

namespace App\Http\Controllers\Api\V1;


use App\Models\Movie;
use App\Models\Category;
use App\Models\User;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

}
