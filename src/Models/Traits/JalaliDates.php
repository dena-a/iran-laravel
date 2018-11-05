<?php

namespace Dena\IranLaravel\Models\Traits;

use Morilog\Jalali\Jalalian;

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
    public function getJalaliDatesAttribute() : object
    {
        $dates = [];

        if (isset($this->jalali_dates)) {
            foreach ($this->jalali_dates as $date) {
                $dates[$date] = isset($this->$date) ? Jalalian::fromCarbon($this->$date)->toString() : null;
            }
        }

        return (object) $dates;
    }
}
