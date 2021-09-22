<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;
use Laravelista\Comments\Commentable;



class Post extends Model
{
    use HasFactory ,Commentable;
    protected $fillable=[
        'body'
    
    ];

    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id); //Laravel kolekcija
    }


    

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }
}
