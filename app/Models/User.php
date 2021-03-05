<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
    public function artikels(){
     return $this->hasMany( \app\models\artikel::class, 'users_id',);
        
    }
    public function kategoriartikels(){
        return $this->hasMany( \app\models\kategoriartikel::class, 'users_id',);
           
       }
       public function beritas(){
        return $this->hasMany( \app\models\berita::class, 'users_id',);
           
       }
       public function kategoriberitas(){
        return $this->hasMany( \app\models\kategoriberita::class, 'users_id',);
           
       }
       public function galeris(){
        return $this->hasMany( \app\models\galeri::class, 'users_id',);
           
       }
       public function kategorigaleris(){
        return $this->hasMany( \app\models\kategorigaleri::class, 'users_id',);
           
       }
       public function pengumumans(){
        return $this->hasMany( \app\models\pengumuman::class, 'users_id',);
           
       }
       public function kategoripengumumans(){
        return $this->hasMany( \app\models\kategoripengumuman::class, 'users_id',);
           
       }

        /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
    
}
