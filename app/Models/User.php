<?php

namespace App\Models;

use App\Roles\Contracts\UserRoles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'login',
        'phone',
        'email',
        'date_of_birth',
        'about',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function role()
    {
        return $this->belongsToMany(Role::class, 'user_role');
    }

    public function isAdmin()
    {
        return $this->role()->where('role_name', UserRoles::ROLE_ADMIN)->exists();
    }

    public function isUser()
    {
        return $this->role()->where('role_name', UserRoles::ROLE_USER)->exists();
    }
}
