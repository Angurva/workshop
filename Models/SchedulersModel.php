<?php declare (strict_types = 1);

namespace Models;

class SchedulersModel extends AbstractModel
{
    public static function getScheduler():array
    {
       $req = parent::getConnection()->prepare("SELECT sc_day, date_format(sc_am_start,'%H:%i') AS sc_am_start, date_format(sc_am_end,'%H:%i') AS sc_am_end, date_format(sc_ap_start,'%H:%i') AS sc_ap_start, date_format(sc_ap_end,'%H:%i') AS sc_ap_end  from schedules  WHERE sc_am_start != '00:00'");
       $req->execute();
       $result = $req->fetchAll();
       $req->closeCursor();
       return $result;
       
       //return self::getAll('schedules');
    }

    public static function changeScheduler(array $scheduler):void
    {
                
        $req = parent::getConnection()->prepare("UPDATE schedules SET sc_am_start = :sc_am_start, sc_am_end = :sc_am_end,sc_ap_start = :sc_ap_start, sc_ap_end = :sc_ap_end WHERE sc_day = :sc_day");
        $req->bindValue(':sc_am_start', $scheduler['sc_am_start']);
        $req->bindValue(':sc_am_end', $scheduler['sc_am_end']);
        $req->bindValue(':sc_ap_start', $scheduler['sc_ap_start']);
        $req->bindValue(':sc_ap_end', $scheduler['sc_ap_end']);
        $req->bindValue(':sc_day', $scheduler['sc_day']);
        $req->execute();
        $req->closeCursor();
    }
}