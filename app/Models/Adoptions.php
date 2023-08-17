<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adoptions extends Model
{
    use HasFactory;

    protected $table = 'adoptions';

    protected $primaryKey = 'id';

    protected $fillable = ['user_id', 'dog_id', 'turnoverpic'];
}
