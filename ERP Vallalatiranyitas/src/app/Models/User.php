<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Task;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //public function setPasswordAttribute($password) {
      //  $this->attributes['password'] = Hash::make($password);
    //}

    public function jogoks(){
        return $this->belongsToMany('App\Models\Jogok');
    }
   
   
    public function tasks()
{
  return $this->belongsToMany(Task::class, 'user_task');
}
public function felhasznalok()
{
  return $this->belongsToMany(Felhasznalok::class);
}
        /* Check if the user has a role
        * @param string $role
        * @return bool
        */
    public function hasAnyRole(string $role){
        return null !== $this->jogoks()->where('name', $role)->first();        
    }
    /* Check if the user has any given role
        * @param array $role
        * @return bool
        */
    public function hasAnyRoles(array $role){
        return null !== $this->jogoks()->whereIn('name', $role)->first();        
    }

}
