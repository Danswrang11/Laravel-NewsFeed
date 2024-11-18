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
        'topic_name', 'image', 'description', 'author', 'published_date', 'category_id', 'status'
    ];

    // A post belongs to a category (one-to-many or many-to-many)
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'categories');
    }

    // A post can have many tags
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag');
    }
}
