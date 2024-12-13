<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ["book_id", "rating"];
    use HasFactory;

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

}
