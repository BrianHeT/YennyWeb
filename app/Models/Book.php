<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $primaryKey = 'book_id';

    protected $fillable = ['title', 'price', 'release_date','format','editorial','author' ,'synopsis','image'];
}
