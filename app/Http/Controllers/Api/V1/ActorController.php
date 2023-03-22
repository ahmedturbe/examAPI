<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Actor;
use App\Http\Requests\StoreActorRequest;
use App\Http\Requests\UpdateActorRequest;
use App\Http\Controllers\Controller;
use Illuminate\Console\View\Components\Task;

class ActorController extends Controller
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
       //Return all the actors with every movie he acting in
        return Actor::with('movies')->paginate(3);
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
    public function store(StoreActorRequest $request)
    {
        $actor = Actor::create($request->validated());
        return Actor::latest()->first();

    }

    /**
     * Display the specified resource.
     */
    public function show(Actor $actor)
    {
        return Actor::where('id', $actor->id)->with('movies')->get()->toJson(JSON_PRETTY_PRINT);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActorRequest $request, Actor $actor)
    {
        $actor->update($request->validated());
        return "Actor updated";

    }
}
