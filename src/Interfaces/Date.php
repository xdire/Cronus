<?php namespace Xdire\Cronus\Interfaces;

/**
 * User: anton.repin
 * Date: 5/16/17
 * Time: 12:36 PM
 */

interface Date
{

    /**
     * @return int
     */
    public function getYear();

    /**
     * @param int $year
     */
    public function setYear($year);

    /**
     * @return int
     */
    public function getMonth();

    /**
     * @param int $month
     */
    public function setMonth($month);

    /**
     * @return int
     */
    public function getDay();

    /**
     * @param int $day
     */
    public function setDay($day);

    /**
     * @return int
     */
    public function getHour();

    /**
     * @param int $hour
     */
    public function setHour($hour);

    /**
     * @return int
     */
    public function getMinute();

    /**
     * @param int $minute
     */
    public function setMinute($minute);

    /**
     * @return int
     */
    public function getSecond();

    /**
     * @param int $second
     */
    public function setSecond($second);

    /**
     * @return int
     */
    public function getDayOfWeek();

    /**
     * @return string
     */
    public function toString();

    /**
     * @return string
     */
    public function toStringDate();

    /**
     * @return array
     */
    public function toArray();

    /**
     * Check if current date will be happened after some other date
     *
     * @param   Date $date
     * @return  bool
     */
    public function isGreater(Date $date);

    /**
     * Check if current date happened to be earlier than some other date
     *
     * @param   Date $date
     * @return  bool
     */
    public function isLesser(Date $date);

    /**
     * Check if current date is equal to some other date
     *
     * @param   Date $date
     * @return  bool
     */
    public function isEqual(Date $date);

    /**
     * Check if current date is in range of other 2 dates
     *
     * @param   Date $dateStart
     * @param   Date $dateEnd
     * @return  bool
     */
    public function isInRange(Date $dateStart, Date $dateEnd);

}