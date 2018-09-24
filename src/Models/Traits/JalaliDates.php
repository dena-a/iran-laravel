<?php

namespace Dena\IranLaravel\Models\Traits;

use Morilog\Jalali\jDate;

/**
 * Use in Eloquent Model
 */
trait JalaliDates
{
    /**
     * Add 'jalali_dates' to eloquent $appends variable
     * @var array $jalali_dates add to model
     *
     * @return void
     */
    public function getJalaliDatesAttribute()
    {
        $dates = [];

        if (isset($this->jalali_dates)) {
            foreach ($this->jalali_dates as $date) {
                $dates[$date] = isset($this->$date) ? jDate::forge($this->$date)->format('datetime') : null;
            }
        }

        return $dates;
    }
}
