<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'username', 'password', 'email', 'nome', 'cognome'
    ];

    protected $table = "clienti";
    
    public function posts(){
        return $this->hasMany('app/Models/Post');
    }

    public function likes(){
        return $this->hasMany('app/Models/Likes');
    }

    public function commenti(){
        return $this->hasMany('app/Models/Comments');
    }
}

?>