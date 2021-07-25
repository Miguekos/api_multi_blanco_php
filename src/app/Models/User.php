<?php

use Carbon\Carbon;
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
        'name',
        'email',
        'password',
        'nif',
        'phone',
        'birthday',
        'address',
        'province',
        'city',
        'zip_code',
        'colorPair',
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
    public function setPasswordAttribute($value)
    {
        if(isset($value))
        {
            $this->attributes['password'] = bcrypt($value);
        }
    }*/
    
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

    /**
     * The specialties of this user.
     */
    public function specialties()
    {
        return $this->hasMany(Specialty::class);
    }
    
    /**
     * Get the post that owns the comment.
     */
    public function assigmentsOperator()
    {
        return $this->hasMany(Assigment::class, 'operator_id','id');
    }
}
