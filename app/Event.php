<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DatePeriod;
use DateTime;
use DateInterval;

class Event extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
   public function getWednesdays($y, $m)
    {
        return new DatePeriod(
            new DateTime("first wednesday of $y-$m"),
            DateInterval::createFromDateString('next wednesday'),
            new DateTime("last day of $y-$m")
        );
    }
    public function getNextSunday(){
        $sampleDate='Tuesday, November 1,2016';
        $time=strtotime($sampleDate);
        $end=strtotime('fifth Sunday',$time);
        $format = 'l, F j, Y';
        $end_day=date($format,$end);

        return $end_day;
    }
    public function getNextDay($day,$oldDate){
        $time=strtotime($oldDate);
        $end=strtotime("next $day",$time);
        $format = 'Y-m-d H:i:s';
        $end_day=date($format,$end);

        return $end_day;
    }
    public function getMonthlyDays($y, $m,$day)
    {
        return new DatePeriod(
            new DateTime("first $day of $y-$m"),
            DateInterval::createFromDateString("next $day"),
            new DateTime("last day of $y-$m")
        );
    }
    public function getMonthly($y,$m,$day, $event){
        $breakMontlyArr=explode(',',$event->monthsDay);
        $x=0;
        $allMontlyDays=array();
        //dd($breakMontlyArr);
        foreach ($this->getMonthlyDays($y,$m,$day) as $daysInMonth){
            $allMontlyDays[$x]=$daysInMonth->format("Y-m-d");
            $x++;
        }
        //dd($allMontlyDays);
        $onlyDays=array();
        for($z=0;$z<count($breakMontlyArr);$z++) {
            if($breakMontlyArr[$z] != 5){
                $onlyDays[$z] =$allMontlyDays[$breakMontlyArr[$z]-1] ;
            }else{
                $onlyDays[$z]=end($allMontlyDays);
            }
        }


        $copyArr=$onlyDays;

        //dd($copyArr);
        for($c=0;$c<count($copyArr);$c++){
            if($onlyDays[$c]< date("Y-m-d H:i:s")){

                array_splice($copyArr,$c);


            }
        }
        return $copyArr;

    }
    public function venue(){
        return $this->belongsTo('App\Venue');
    }

    public function fundraisingEvent(){
        return $this->hasOne('App\FundraisingEvent');
    }
    public function donations(){
        return $this->hasOne('App\Donation');
    }
}
