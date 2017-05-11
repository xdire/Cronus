<?php

/**
 * Developed with love by
 * @author Anton Repin <ar@xdire.io>
 * @date   5/11/17
 */

use Xdire\Cronus\Entities\Date;
use PHPUnit\Framework\TestCase;

class DateTest extends TestCase
{

    function testDateEntityNoDateFormat() {

        $de = new Date("");

        $this->assertTrue(
            "0000-00-00 00:00:00" === $de->toString(),
            "Improper date format with empty date");

    }

    function testDateEntityWithDateFormat() {

        $de = new Date("2017-05-18 15:34:11");

        $this->assertTrue(
            "2017-05-18 15:34:11" === $de->toString(),
            "Improper date format with filled date");

    }



    function testIncrementBy5Days() {

        $de = new Date("2017-08-01 12:01:35");
        $de->incrementDays(5);

        $this->assertEquals(
            date("Y-m-d H:i:s", strtotime("+5 days", strtotime("2017-08-01 12:01:35"))),
            $de->toString(),
            "Increment fails for 5 days");

    }

    function testIncrementBy20Days() {

        $de = new Date("2016-08-01 12:01:35");
        $de->incrementDays(10);

        $this->assertEquals(
            date("Y-m-d H:i:s", strtotime("+10 days", strtotime("2016-08-01 12:01:35"))),
            $de->toString());

    }

    function testIncrementBy30Days() {

        $de = new Date("2016-08-01 12:01:35");
        $de->incrementDays(30);

        $this->assertEquals(
            date("Y-m-d H:i:s", strtotime("+30 days", strtotime("2016-08-01 12:01:35"))),
            $de->toString());

    }

    function testIncrementBy60Days() {

        $de = new Date("2016-08-01 12:01:35");
        $de->incrementDays(60);

        $this->assertEquals(
            date("Y-m-d H:i:s", strtotime("+60 days", strtotime("2016-08-01 12:01:35"))),
            $de->toString());

    }

    function testIncrementBy120Days() {

        $de = new Date("2016-08-01 12:01:35");
        $de->incrementDays(120);

        $this->assertEquals(
            date("Y-m-d H:i:s", strtotime("+120 days", strtotime("2016-08-01 12:01:35"))),
            $de->toString());

    }

    function testIncrementBy180Days() {

        $de = new Date("2016-08-01 12:01:35");
        $de->incrementDays(180);

        $this->assertEquals(
            date("Y-m-d H:i:s", strtotime("+180 days", strtotime("2016-08-01 12:01:35"))),
            $de->toString());

    }

    function testIncrementBy365Days() {

        $de = new Date("2016-08-01 12:01:35");
        $de->incrementDays(365);

        $this->assertEquals(
            date("Y-m-d H:i:s", strtotime("+365 days", strtotime("2016-08-01 12:01:35"))),
            $de->toString());

    }

    function testIncrementBy730Days() {

        $de = new Date("2016-08-01 12:01:35");
        $de->incrementDays(730);

        $this->assertEquals(
            date("Y-m-d H:i:s", strtotime("+730 days", strtotime("2016-08-01 12:01:35"))),
            $de->toString());

    }

    function testIncrementBy1400Days() {

        $de = new Date("2016-08-01 12:01:35");
        $de->incrementDays(1400);

        $this->assertEquals(
            date("Y-m-d H:i:s", strtotime("+1400 days", strtotime("2016-08-01 12:01:35"))),
            $de->toString());

    }

}
