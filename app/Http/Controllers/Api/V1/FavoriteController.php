<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Requests\StoreFavoriteRequest;
use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Movie;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function store(StoreFavoriteRequest $request) {
        $user = User::find($request->user_id);
        $movie = Movie::find($request->movie_id);
        $user->favorites()->attach($movie);
         return "Movie added as favorite";
     }
     public function destroy(StoreFavoriteRequest $request){
        $user = User::find($request->user_id);
        $movie = Movie::find($request->movie_id);
        $user->favorites()->detach($movie);
          return "Movie removed from favorites";
     }
}
