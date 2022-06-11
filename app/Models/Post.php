<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    public $timestamps = false;
    
    protected $table = "post";
    
    public function users(){
        return $this->belongsTo('app/Models/User');
    }

    public function likes(){
        return $this->hasMany('app/Models/Likes');
    }

    public function commenti(){
        return $this->hasMany('app/Models/Comments');
    }

}

?>