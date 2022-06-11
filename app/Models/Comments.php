<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Comments extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'username', 'post', 'text'
    ];

    protected $table = "comments";
    
    public function posts(){
        return $this->belongsTo('app/Models/Post');
    }

    public function user(){
        return $this->belongsTo('app/Models/User');
    }
}

?>