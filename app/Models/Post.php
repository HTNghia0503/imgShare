<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'img_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }

    public function collection()
    {
        return $this->belongsToMany(Collection::class, 'collection_post', 'post_id', 'collection_id');
    }

    public function like()
    {
        return $this->belongsToMany(User::class, 'likes', 'post_id', 'user_id');
    }

    public function comment()
    {
        return $this->belongsToMany(User::class, 'comments', 'post_id', 'user_id');
    }

    public function collections()
    {
        return $this->belongsToMany(Collection::class)->withPivot('collection_id');
    }
}
