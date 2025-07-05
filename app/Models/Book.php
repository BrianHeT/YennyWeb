<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    protected $table = 'books';

    protected $primaryKey = 'book_id';

    protected $fillable = ['title', 'price', 'release_date','format','editorial','author' ,'synopsis','image'];

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(
            Genre::class,
            'books_have_genres',
            'book_fk',
            'genre_fk',
            'book_id',
            'genre_id',
        
        );
    }
}
