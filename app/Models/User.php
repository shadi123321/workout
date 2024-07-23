<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'gender_id',
        'goal_id',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function goal()
    {
        return $this->belongsTo(goal::class,'goal_id');
    }
    public function gender()
    {
        return $this->belongsTo(gender::class,'gender_id');
    }
    public function detail()
    {
        return $this->hasMany(detail::class,'user_id');
    }
    public function exercises()
{
return $this->belongsToMany(exercise::class,'programs');
}
public function progressRelation()
    {
        return  $this->hasOne(progress::class,'user_id');

    }
}
