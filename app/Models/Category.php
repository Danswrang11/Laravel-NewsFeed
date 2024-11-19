<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $table ="categories";
    protected $primaryKey ='category_id';
    protected $fillable = ['topic', 'description'];

    // A category can have many posts through hasMany function
    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id','category_id');
    }
}
