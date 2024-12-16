<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //use HasFactory;
    public $timestamps = false; //deactivate timestamps
    protected $fillable = [ //specifies which columns to be imported from the database
        'name',
        'event_date',
        'description'
    ];
}
