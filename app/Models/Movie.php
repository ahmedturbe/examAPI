<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Movie extends Model
{

    use HasFactory;
    protected $table = 'movies';
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description'
    ];
    protected $hidden = ['created_at', 'updated_at'];
    public function category(): BelongsTo {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function actors() {
        return $this->belongsToMany(Actor::class, 'actor_movie', 'movie_id','actor_id');
    }
}
