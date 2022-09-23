<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //
    protected $table = 'banners';
    protected $fillable = ['title','desc','image','status'];
    public function bannerimage() {

        return $this->image;
    }

}
