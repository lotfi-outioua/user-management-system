<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
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

    /*
        set + {Attribute:Password} + Attribute : setPasswordAttribute
        {Attribute} is the cased of the column in DB
        function to Hash all password when a user is create
    */
    public function setPasswordAttribute($password) {
        $this->attributes['password'] = Hash::make($password);
    }

    public function roles() {
        return $this->belongsToMany('App\Models\Role');
    }

    // Check if the user has a role
    public function hasAnyRole(string $role) {
        return null !== $this->roles()->where('name', $role)->first();
    }

    // Check if the user has any role
    public function hasAnyRoles(array $role) {
        return null !== $this->roles()->whereIn('name', $role)->first();
    }
}
