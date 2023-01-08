<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    use HasFactory;
    protected $table = 'applications';
    protected $primaryKey = 'id'; 
    protected $fillable = ['user_id', 'dog_id', 'appstatus'];
    // fillables- fields ng form natin that we need to protect

}

