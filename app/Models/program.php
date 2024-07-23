<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class program extends Model
{
    protected $fillable = [
        'user_id','excersice_id',
    ];
    use HasFactory;
}
