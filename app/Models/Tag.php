<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $table ="tags";
    protected $primaryKey ='tag_id';
    protected $fillable = ['tag_name'];

    // A tag can belong to many posts through belongsToMany function
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'posts_tags','post_id', 'tag_id');
    }
}
