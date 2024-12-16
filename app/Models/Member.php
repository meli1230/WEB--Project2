<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public $timestamps = false; //deactivate timestamps
    //use HasFactory;
    protected $fillable = [ //specifies which columns to be imported from the database
        'name',
        'email',
        'profession',
        'company',
        'linkedin_url',
        'status'
    ];
}
