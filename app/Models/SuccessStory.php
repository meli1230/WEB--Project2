<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuccessStory extends Model
{
    //use HasFactory;
    public $timestamps = false; //deactivate timestamps
    protected $fillable = [
        'title',
        'story',
        'member_id'
    ];

}
