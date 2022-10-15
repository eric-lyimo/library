<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class likes extends Model
{
    use HasFactory;
    public $timestamps=false;
    public function books()
    {
        return $this->belongsTo(Books::class, 'book_id', 'id');
    }
}
