<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class goal extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        
    ];
    public function user()
    {
        return $this->hasMany(User::class,'goal_id');
    }
   
}
