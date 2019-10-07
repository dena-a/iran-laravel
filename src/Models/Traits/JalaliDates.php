<?php

namespace Dena\IranLaravel\Models\Traits;

use Morilog\Jalali\Jalalian;

/**
 * Use in Eloquent Model
 */
trait JalaliDates
{
    /**
     * The attributes that should be converet to jalali dates.
     *
     * @var array
     *
     * protected $jalali_dates = [
     *     'deleted_at',
     *     'created_at',
     *     'updated_at',
     * ];
     */

    /**
     * Add 'jalali' to eloquent $appends variable
     * @var array $jalali_dates add to model
     *
     * @return void
     */
    public function getJalaliAttribute(): object
    {
        $dates = [];

        if (isset($this->jalali_dates)) {
            foreach ($this->jalali_dates as $date) {
                $dates[$date] = isset($this->$date) ? Jalalian::fromCarbon($this->$date)->format('Y/m/d H:i:s') : null;
            }
        }

        return (object) $dates;
    }
}
