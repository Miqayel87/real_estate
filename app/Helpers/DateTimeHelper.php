<?php

namespace App\Helpers;

use Carbon\Carbon;

class DateTimeHelper
{
    public static function diff($date)
    {
        $date1 = Carbon::parse($date);
        $date2 = Carbon::now();
        $diff = $date1->diff($date2);

        $years = $diff->y;
        $days = $diff->d;
        $hours = $diff->h;
        $minutes = $diff->i;

        if($years){
            return $years.' y ago';
        }
        else if($days){
            return $days.' d ago';
        }
        else if($hours){
            return $hours.' h ago';
        }
        else {
            return $minutes.' m ago';
        }
    }
}
