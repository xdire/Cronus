<?php namespace Xdire\Cronus\Abstracts;

/**
 * Developed with love by
 * @author Anton Repin <ar@xdire.io>
 * @date   5/10/17
 */

abstract class Date
{
    /** @var int[]  */
    private static $monthDaysNormal = [31,28,31,30,31,30,31,31,30,31,30,31];
    /** @var int[] */
    private static $monthDaysLeap = [31,29,31,30,31,30,31,31,30,31,30,31];
    /** @var int */
    protected $year = 0;
    /** @var int */
    protected $month = 0;
    /** @var int */
    protected $day = 0;
    /** @var int */
    protected $hour = 0;
    /** @var int */
    protected $minute = 0;
    /** @var int */
    protected $second = 0;
    /**
     *  Timezone in minutes
     *
     *  @var int
     */
    protected $timeZone = 0;

    /**
     * @param string $stringDate
     */
    protected final function createFromString($stringDate) {

        $date = date_parse($stringDate);

        $this->year = $date["year"] !== false ? $date["year"] : 0;
        $this->month = $date["month"] !== false ? $date["month"] : 0;
        $this->day = $date["day"] !== false ? $date["day"] : 0;
        $this->hour = $date["hour"] !== false ? $date["hour"] : 0;
        $this->minute = $date["minute"] !== false ? $date["minute"] : 0;
        $this->second = $date["second"] !== false ? $date["second"] : 0;

    }

    /**
     * @param array $date
     */
    protected final function createFromArray(array $date) {

        if(isset($date['Y']))
            $this->year = (int)$date['Y'];
        if(isset($date['M']))
            $this->month = (int)$date['M'];
        if(isset($date['D']))
            $this->day = (int)$date['D'];
        if(isset($date['h']))
            $this->hour = (int)$date['h'];
        if(isset($date['m']))
            $this->minute = (int)$date['m'];
        if(isset($date['s']))
            $this->second = (int)$date['s'];
        if(isset($date['z']))
            $this->timeZone = (int)$date['z'];

    }

    /**
     * @param int $timeZone
     */
    protected final function setTimeZoneHourOffset($timeZone)
    {
        $this->timeZone = (int)$timeZone * 60;
    }

    /**
     * @param int $timeZoneOffset
     */
    protected final function setTimeZoneMinuteOffset($timeZoneOffset)
    {
        $this->timeZone = (int)$timeZoneOffset;
    }

    /**
     * @param   int $year
     * @param   int $mon
     * @return  int
     */
    protected final function getDaysInMonth($year, $mon)
    {
        return ($year % 4 === 0) ? self::$monthDaysLeap[$mon-1] : self::$monthDaysNormal[$mon-1];
    }

    /*  ------------------------------------------------------------------------------------------
     *
     *
     *                                  Comparison methods
     *
     *
        ------------------------------------------------------------------------------------------*/
    /**
     * Check if current date will be happened after some other date
     *
     * @param   Date $date
     * @return  bool
     */
    public function isGreater(Date $date) {

        if($date->year < $this->year)

            return true;

        elseif ($date->year === $this->year) {

            if($date->month < $this->month)

                return true;

            else if($date->month === $this->month && $date->day <= $this->day) {

                if($date->day < $this->day)
                    return true;

                elseif ($date->day === $this->day) {

                    if($date->hour < $this->hour)
                        return true;

                    elseif ($date->hour === $this->hour) {

                        if($date->minute < $this->minute)
                            return true;

                        if($date->minute === $this->minute && $date->second < $this->second)
                            return true;

                    }

                }

            }

        }

        return false;

    }

    /**
     * Check if current date happened to be earlier than some other date
     *
     * @param   Date $date
     * @return  bool
     */
    public function isLesser(Date $date) {

        if($date->year > $this->year)
            return true;

        elseif ($date->year === $this->year) {

            if($date->month > $this->month)
                return true;

            elseif ($date->month === $this->month && $date->day >= $this->day) {

                if($date->day > $this->day)
                    return true;

                elseif ($date->day === $this->day) {

                    if($date->hour > $this->hour)
                        return true;

                    elseif ($date->hour === $this->hour) {

                        if($date->minute > $this->minute)
                            return true;

                        elseif ($date->minute === $this->minute && $date->second < $this->second)
                            return true;

                    }

                }

            }

        }

        return false;

    }

    /**
     * Check if current date is equal to some other date
     *
     * @param   Date $date
     * @return  bool
     */
    public function isEqual(Date $date) {

        if($date->year === $this->year
            && $date->month === $this->month
            && $date->day === $this->day
            && $date->hour === $this->hour
            && $date->minute === $this->minute
            && $date->second === $this->second)
            return true;

        return false;

    }

    /**
     * Check if current date is in range of other 2 dates
     *
     * @param   Date $dateStart
     * @param   Date $dateEnd
     * @return  bool
     */
    public function isInRange(Date $dateStart, Date $dateEnd) {

        if(($this->isGreater($dateStart) || $this->isEqual($dateStart))
            && ($this->isLesser($dateEnd) || $this->isEqual($dateEnd)))
            return true;

        return false;

    }

    /*  ------------------------------------------------------------------------------------------
     *
     *
     *                                  GET / SET Methods
     *
     *
        ------------------------------------------------------------------------------------------*/

    /**
     * @return int
     */
    public function getTimeZoneHourOffset()
    {
        return $this->timeZone;
    }

    /**
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param int $year
     */
    public function setYear($year)
    {
        $this->year = (int)$year;
    }

    /**
     * @return int
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * @param int $month
     */
    public function setMonth($month)
    {
        $this->month = (int)$month;
    }

    /**
     * @return int
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @param int $day
     */
    public function setDay($day)
    {
        $this->day = (int)$day;
    }

    /**
     * @return int
     */
    public function getHour()
    {
        return $this->hour;
    }

    /**
     * @param int $hour
     */
    public function setHour($hour)
    {
        $this->hour = (int)$hour;
    }

    /**
     * @return int
     */
    public function getMinute()
    {
        return $this->minute;
    }

    /**
     * @param int $minute
     */
    public function setMinute($minute)
    {
        $this->minute = (int)$minute;
    }

    /**
     * @return int
     */
    public function getSecond()
    {
        return $this->second;
    }

    /**
     * @param int $second
     */
    public function setSecond($second)
    {
        $this->second = (int)$second;
    }

    /**
     * @return int
     */
    public function getDayOfWeek() {

        $y = $this->year;
        $tm = [0,3,2,5,0,3,5,1,4,6,2,4];
        $y -= $this->month < 3;

        return (($y + $y/4 - $y/100 + $y/400 + $tm[$this->month-1] + $this->day) % 7) + 1;

    }

    /**
     * @return string
     */
    public function toString() {
        return sprintf("%'.04d-%'.02d-%'.02d %'.02d:%'.02d:%'.02d",
            $this->year, $this->month, $this->day, $this->hour, $this->minute, $this->second);
    }

    /**
     * @return string
     */
    public function toStringDate() {
        return sprintf("%.04d-%'.02d-%'.02d",
            $this->year, $this->month, $this->day);
    }

    /**
     * @return array
     */
    public function toArray() {

        return [
            "Y" => $this->year,
            "M" => $this->month,
            "D" => $this->day,
            "h" => $this->hour,
            "m" => $this->minute,
            "s" => $this->second,
            "z" => $this->timeZone
        ];

    }

    /*  ------------------------------------------------------------------------------------------
     *
     *
     *                                          Behavior methods
     *
     *
        ------------------------------------------------------------------------------------------*/

    /**
     * Increment days algorithm,
     * will be incrementing days
     * month by month
     *
     * Tested:
     * @see \DateTest
     *
     * @param int $days
     */
    protected final function incrementByDays($days) {

        while($days > 0) {

            $currentMonthDays = $this->getDaysInMonth($this->year, $this->month);

            $left = $days - ($currentMonthDays - $this->day + 1);

            if($left > 0) {

                // Increment months
                if(++$this->month > 12) {
                    $this->month = 1;
                    $this->year++;
                }

                // Set to start of the month
                $this->day = 1;

                // Refresh Days
                $days -= $days - $left;

            } else {

                $this->day += $days;
                $days = 0;

                // If days got over the current month possible days
                if($this->day > $currentMonthDays) {

                    // Calculate difference
                    $rest = $this->day - $currentMonthDays;
                    // Increment months
                    if(++$this->month > 12) {
                        $this->month = 1;
                        $this->year++;
                    }
                    // Assign rest
                    $this->day = $rest;

                }

            }

        }

    }

    /**
     * Decrement days
     *
     * @param int $days
     */
    protected final function decrementByDays($days)
    {

        while($days > 0) {

            $left = $days - $this->day;

            if($left > 0) {

                // Decrement
                if(--$this->month < 1) {
                    $this->month = 12;
                    $this->year--;
                }

                $currentMonthDays = $this->getDaysInMonth($this->year, $this->month);

                // Set to end of the month
                if($left < $currentMonthDays) {

                    $this->day = $currentMonthDays - $left;
                    if($this->day == 0)
                        $this->day = $currentMonthDays;

                    $days = 0;

                }
                else {
                    $days -= $this->day;
                    $this->day = $currentMonthDays;
                }

            } else {

                // Subtract days if number of days can fit into current month
                $this->day -= $days;
                $days = 0;

            }

        }

    }

    /**
     * @param int $months
     */
    protected final function incrementByMonths($months)
    {

        while ($months > 0) {

            if(++$this->month > 12) {
                $this->month = 1;
                $this->year++;
            }

            $months--;

        }

    }

    /**
     * @param int $months
     */
    protected final function decrementByMonths($months)
    {

        while ($months > 0) {

            if(--$this->month < 1) {
                $this->month = 12;
                $this->year--;
            }

            $months--;

        }

    }

    /**
     * @param int $years
     */
    protected final function incrementByYears($years)
    {
        $this->year += $years;
    }

    /**
     * @param int $years
     */
    protected final function decrementByYears($years)
    {
        $this->year -= $years;
    }

}