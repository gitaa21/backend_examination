<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ["title", "author_id", "category_id", "description", "cover_image"];
    use HasFactory;

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function category()
    {
        return $this->belongsTo(BookCategory::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
