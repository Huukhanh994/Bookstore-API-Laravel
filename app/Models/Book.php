<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = ['name', 'description', 'publication_year'];

    public function authors()
    {
        return $this->hasManyThrough(
            Author::class,
            BookAuthor::class,
            'book_id', // Foreign key on the environments table...
            'id', // Foreign key on the deployments table...
            'id', // Local key on the projects table...
            'author_id' // Local key on the environments table...
        );
    }
}
