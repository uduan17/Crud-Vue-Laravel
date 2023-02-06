<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Book;

class lend extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'customer_user_id',
        'owner_user_id',
        'book_id',
        'date_out',
        'date_in',
        'status',
    ];

    public function Book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }

    public function Owner()
    {
        return $this->belongsTo(User::class, 'owner_user_id', 'id');
    }

    public function Customer()
    {
        return $this->belongsTo(User::class, 'customer_user_id', 'id');
    }
}
