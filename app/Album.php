<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image;

class Album extends Model
{
    protected $table = 'albums';
    protected $fillable = array('name', 'description', 'cover_image', 'user_id');

    public function Photos(){
      return $this->hasMany('\App\Image');
    }

    public function User() {
      return $this->belongsTo('\App\User');
    }
}
