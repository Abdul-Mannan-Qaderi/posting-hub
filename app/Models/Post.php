<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Like;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $fillable = [
        'body', 
        'user_id'
    ];


    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }


    public function likedBy(User $user) {
        return $this->likes->contains('user_id', $user->id);
    }


    public function ownedBy(User $user) {
        return $user->id === $this->user_id;
    }


    public function likes(): HasMany {
        return $this->hasMany(Like::class);
    }
}
