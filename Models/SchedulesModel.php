<?php declare (strict_types = 1);

namespace Models;

class SchedulesModel extends AbstractModel
{
    public static function getSchedules():array
    {
       return self::getAll('schedules');
    }

    public static function modifySchedules():void
    {

    }
}