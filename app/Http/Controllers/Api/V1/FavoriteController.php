<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Requests\RemoveFavoriteRequest;
use App\Http\Requests\StoreFavoriteRequest;
use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function store(StoreFavoriteRequest $request) {
         $favorite = new Favorite();
         $favorite->movie_id = $request->movie_id;
         $favorite->user_id = auth()->user()->id;
         $favorite->save();
         return "Movie added as favorite";
     }
     public function destroy(RemoveFavoriteRequest $request){
       $movie_id = $request->movie_id;
       $user_id = auth()->user()->id;
       //dd($user_id);
        $favorite = Favorite::where('movie_id', $movie_id)->where('user_id', $user_id)->delete();

            return "Movie removed from favorites";


     }
}
