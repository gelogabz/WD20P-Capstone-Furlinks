<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dogs extends Model
{
    use HasFactory;
    protected $table = 'dogs';
    protected $id = 'id';
    protected $fillable = ['id', 'breed_id1', 'breed_id2', 'pic', 'size', 'color', 'name', 'location', 'rescued', 'fee', 'feenotes', 'gender', 'age', 'birthdate', 'rescuedate', 'neutered'];
    // fillables- fields ng form natin that we need to protect

}
