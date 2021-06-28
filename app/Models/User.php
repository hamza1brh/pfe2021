<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use App\Models\Profile;
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
        'address',
        'phone_num'
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


    // used to create ussers manually ; hash the password to strore it in the database instead of storing it as plain text  
    // public function  setPasswordAttribute ($password)
    // {
    //     $this->attributes['password']= Hash::make($password);
    // }




    public function roles ()
    {
        return $this->belongsToMany('App\Models\Role');
    }




    public function profile()
    {
        return $this->hasOne(Profile::class);
    }


    /**
     * check if the user has a single role = $role 
     * for ex: hasRole('admin') returns true if $this has role of  admin 
     */
    public function hasRole(string $role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }

    /**
     * check if $this has multiple roles 
     * ex : hasAnyRoles(['admin', 'instructor']) will return true if the user ($this) has both the admin and the instructor roles 
     */
    public function hasAnyRoles(array $role)
    {
        return null !== $this->roles()->whereIn('name', $role)->first();
    }


}
