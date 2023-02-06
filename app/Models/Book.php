<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Author;
use App\Models\Lend;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id',
        'author_id',
        'title',
        'image',
        'stock',
        'description'
    ];

    public function Category()
        {
            return $this->belongsTo(Category::class, 'category_id', 'id');
        }
        public function Author()
        {
            return $this->belongsTo(Author::class, 'author_id', 'id');
        }
        public function Lends()
        {
            return $this->hasMany(Lend::class, 'book_id', 'id');
        }
}
