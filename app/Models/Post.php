<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $table ="posts";
    protected $primaryKey ='post_id';
    protected $fillable = [
        'topic', 
        'description',
        'author', 
        'category_id',
        'images'
    ];

    // A post belongs to a category (one-to-many or many-to-many)
    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id','category_id');
    }

    // A post can have many tags
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'posts_tags','post_id', 'tag_id');
    }

}
