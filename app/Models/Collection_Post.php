<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection_Post extends Model
{
    use HasFactory;

    protected $table = 'collection_post';

    protected $fillable = [
        'collection_id',
        'post_id',
        'created_at',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function collection()
    {
        return $this->belongsTo(Collection::class, 'collection_id');
    }
}
