<?php

namespace App\Helpers;

use Carbon\Carbon;
use DateTime;

class DateTimeHelper
{
    /**
     * Calculate the difference between given date and current date.
     *
     * @param string|DateTime $date The date to calculate the difference from.
     * @return string The formatted difference string.
     */
    public static function diff($date): string
    {
        $date1 = Carbon::parse($date);
        $date2 = Carbon::now();
        $diff = $date1->diff($date2);

        $years = $diff->y;
        $days = $diff->d;
        $hours = $diff->h;
        $minutes = $diff->i;

        if ($years) {
            return $years . ' y ago';
        } elseif ($days) {
            return $days . ' d ago';
        } elseif ($hours) {
            return $hours . ' h ago';
        } else {
            return $minutes . ' m ago';
        }
    }
}
