<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //image retrive accessor
    protected $uploads= '/images/';

    protected $fillable =[
        'file',
    ];

    //image retrive accessor 
    public function getFileAttribute($photo)
    {

        return $this->uploads . $photo;
    }
    
}
