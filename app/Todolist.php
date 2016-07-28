<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    //
    protected $fillable = ['title','description','user_id'];
    protected $table = 'todolists';

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
