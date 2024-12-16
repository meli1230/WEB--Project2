<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuccessStory extends Model
{
    use HasFactory;
    public $timestamps = false; //deactivate timestamps
    protected $fillable = [ //specifies which columns to be imported from the database
        'title',
        'story',
        'member_id'];

    //define the relationship to member
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
}
