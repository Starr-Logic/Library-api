<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookAuthor extends Model
{
    protected $table = 'tblBookAuthor';
    protected $primaryKey = null;
    public $incrementing = false;
    protected $guarded = [];

    public function book()
    {
        return $this->belongsTo(Book::class, 'BookID', 'BookID');
    }

    public function author()
    {
        return $this->belongsTo(Author::class, 'AuthorID', 'AuthorID');
    }
}
