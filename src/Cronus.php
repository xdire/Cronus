<?php namespace Xdire\Cronus;

use Xdire\Cronus\Entities\Date;

class Cronus
{

    public static final function date($stringDate = null) {

        if($stringDate === null)
            return new Date("");
        else
            return new Date($stringDate);

    }

}