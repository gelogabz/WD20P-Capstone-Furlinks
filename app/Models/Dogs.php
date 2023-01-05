<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dogs extends Model
{
    use HasFactory;
    protected $table = 'dogs';
    protected $primaryKey = 'id'; 
    protected $fillable = [
    'breed_id1', 'breed_id2', 'name' 
    ];
}

