<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gender extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        
    ];
    public function user()
    {
        return $this->hasMany(User::class,'gender_id');
    }
}
