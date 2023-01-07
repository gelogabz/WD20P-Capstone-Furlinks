<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userprofile extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'firstname', 'lastname', 'location', 'profile_pic', 'about'];
}