<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userprofile extends Model
{
    use HasFactory;

    protected $table = 'userprofiles';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'profile_pic',
        'firstname',
        'lastname',
        'mobile_no',
        'about',
        'gender',
        'address1',
        'address2',
        'city',
        'province',
        'hometype',
        'funds',
        'allowed',
        'withpets',
        'allergy',
        'allvaxed',
        'allneut',
        'euthanized',
        'lostpet',
        'cats',
        'dogs',
        'priresp',
        'finresp',
        'lefthome',
        'hours',
    ];
}
