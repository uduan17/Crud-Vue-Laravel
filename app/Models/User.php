<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\lend;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes,HasRoles;

    
    protected $fillable = [
        'number_id',
        'name',
        'last_name',
        'email',
        'password',
    ];


    protected $appends = ['full_name'];

    protected $hidden = [
        'password',
    ];

    // protected $casts = [
    //     'created_at' => 'datetime:Y-m-d',
    // ];

   //Accesor 
    public function getFullNameAttribute($value)
    {
       return "{$this->name} {$this->last_name}";
    }

    //mutator
    public function setPasswordAttribute($value)
    {
       $this->attributes['password'] = bcrypt($value);
    }

    protected $casts = [
        'created_at' => 'datetime:y-m-d',
        'updated_at' => 'datetime:y-m-d',
    ];

    public function CustomerLends()
    {
        return $this->hasMany(Lend::class, 'customer_user_id', 'id');
    }

    public function OwnerLends()
    {
        return $this->hasMany(Lend::class, 'Owner_user_id', 'id');
    }

}
