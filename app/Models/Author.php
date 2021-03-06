<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table = 'authors';

    protected $fillable = ['name'];

    public function books()
    {
        return $this->hasManyThrough(
            Book::class,
            BookAuthor::class,
            'book_id', // Foreign key on the environments table...
            'author_id', // Foreign key on the deployments table...
            'id', // Local key on the projects table...
            'id' // Local key on the environments table...
        );
    }
}
