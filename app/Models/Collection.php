<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $table = "collections";

    protected $fillable = [
        "user_id",
        "title",
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function post()
    {
        return $this->belongsToMany(Post::class, 'collection_post', 'collection_id', 'post_id');
    }

    // Dùng cho mục đích delete collection
    public function posts()
    {
        return $this->belongsToMany(Post::class)->withPivot('collection_id');
    }

}
