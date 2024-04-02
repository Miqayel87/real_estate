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

        if ($minutes > 60) {
            if ($hours > 24) {
                if ($days > 365) {
                    return $years.' years ago';
                } else {
                    return $days.' days ago';
                }
            } else {
                return $hours.' hours ago';
            }
        } else {
            return $minutes.' min ago';
        }

    }
}
