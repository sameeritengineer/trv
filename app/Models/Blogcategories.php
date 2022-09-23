<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blogcategories extends Model
{
    protected $table = 'blogcategories';
    protected $fillable = ['name','slug','description','image','status'];

    public function blog()
    {
        return $this->hasOne('App\Blog');
    }
    public function bcategoryimage() {

        return $this->image;
    }
}
