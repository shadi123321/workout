<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail extends Model
{
    use HasFactory;
        
          protected $fillable = ['user_id','tall','weight','age','BMI'];
          public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
