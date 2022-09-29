<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DateTime;
use DB;

class Destination extends Model
{
    //
    protected $table = 'destination';
    protected $fillable = ['name','price','start_date_time','end_date_time','includesId','excludesId','description','activities','dest_gallery','image','status','video','countryId','hotelname','hoteladd','depositeId','addinfo'];

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
    public function getCountry($country_id)
    { 
       $country = DB::table('tbl_countries')->where('id',$country_id)->first();
       return $country->name;
    }
    public function getIncludes($inludes_id)
    { 
       $array = explode(',',$inludes_id);  
      return $inludes = DB::table('includes')->whereIn('id', $array)->get();
    }   
    public function getExcludes($exludes_id)
    { 
       $array = explode(',',$exludes_id);  
      return $exludes = DB::table('excludes')->whereIn('id', $array)->get();
    }
    public function videoType($url) {
    if (strpos($url, 'youtube') > 0) {
        return 'youtube';
    } elseif (strpos($url, 'vimeo') > 0) {
        return 'vimeo';
    } else {
        return 'unknown';
    }
    }
    function getYoutubeEmbedUrl($url)
    {
         $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
         $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

        if (preg_match($longUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }

        if (preg_match($shortUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }
        return 'https://www.youtube.com/embed/' . $youtube_id ;
    }
    public function getVimeoEmbedUrl( $text )
      {
            //extract the ID
            preg_match('/https:\/\/vimeo.com\/(\\d+)/',
                    $text,
                    $matches
                );
             
            //the ID of the Vimeo URL: 71673549
            return $id = $matches[1];
      } 

}
