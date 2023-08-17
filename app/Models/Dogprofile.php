<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dogprofile extends Model
{
    use HasFactory;

    protected $table = 'dogs';

    protected $primaryKey = 'id';

    protected $fillable = ['id', 'user_id', 'status_id', 'breed_id1', 'breed_id2', 'pic', 'size', 'color', 'name', 'location', 'rescued', 'fee', 'feenotes', 'gender', 'age_yr', 'age_month', 'birthdate', 'rescuedate', 'neutered'];
}
