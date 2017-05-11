<?php namespace Xdire\Cronus\Entities;

/**
 * Developed with love by
 * @author Anton Repin <ar@xdire.io>
 * @date   5/11/17
 */

class Date extends \Xdire\Cronus\Abstracts\Date
{

    /**
     * Date constructor.
     * @param string $stringDate
     */
    public function __construct($stringDate)
    {
        $this->createFromString($stringDate);
    }

    public function incrementDays($numDays) {
       parent::incrementByDays($numDays);
    }

    public function decrementDays($numDays) {
        parent::decrementByDays($numDays);
    }

}