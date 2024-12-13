<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    protected $fillable = ["name"];
    use HasFactory;

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
