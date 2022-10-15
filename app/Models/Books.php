<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    public $timestamps=false;

    public function likes()
    {
        return $this->hasMany(Likes::class, 'book_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comments::class, 'book_id', 'id');
    }
    public function favorites()
    {
        return $this->hasMany(Favorites::class, 'book_id', 'id');
    }
}
