<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DateTime;

class Destination extends Model
{
    //
    protected $table = 'destination';
    protected $fillable = ['name','price','start_date_time','end_date_time','includesId','excludesId','description','activities','dest_gallery','image','status'];

    public function featured() {

        return $this->image;
    }

    public function getShortContentAttribute()
    {
    	//$desc = str_limit($this->description);
        return substr($this->description, 0, random_int(60, 150)). '...';
    }
    public function getDays()
    { 
        $date1_ts = strtotime($this->start_date_time);
    	$date2_ts = strtotime($this->end_date_time);
	    $diff = $date2_ts - $date1_ts;
	    return round($diff / 86400);
    }

}
