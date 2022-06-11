<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Likes extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'username', 'post'
    ];

    protected $table = "likes";
    
    public function posts(){
        return $this->belongsTo('app/Models/Post');
    }

    public function user(){
        return $this->belongsTo('app/Models/User');
    }
}

?>