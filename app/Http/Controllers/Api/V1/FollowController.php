<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\User;
use App\Http\Requests\StoreFollowRequest;

class FollowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function store(StoreFollowRequest $request) {
        //dd($request);
        $user = User::find($request->user_id);
        $movie = Movie::find($request->movie_id);
        $user->follows()->attach($movie);
         return "Movie added to follow";
     }
     public function destroy(StoreFollowRequest $request){
        $user = User::find($request->user_id);
        $movie = Movie::find($request->movie_id);
        $user->follows()->detach($movie);
          return "Movie removed from follows";
     }
}
