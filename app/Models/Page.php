<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //
    protected $fillable = ['name','description','image','status'];

    public function feature() {

        return $this->image;
    }

}
