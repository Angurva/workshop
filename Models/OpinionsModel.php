<?php declare (strict_types = 1);

namespace Models;

class OpinionsModel extends AbstractModel
{

    private const OPINIONS = 'opinions';

    public static function getOpinions():array
    {
       return self::getAll('opinions');
    }

    public static function createOpinion($surname,$note,$comments):void
    {
        $req = self::getConnection()->prepare("INSERT INTO " . self::OPINIONS . "(surname,note,comments) VALUES (:surname,:note,:comments,:idstatus)" );
        $req->bindParam(':surname', $surname);
        $req->bindParam(':note', $note);
        $req->bindParam(':comments', $comments);
        $req->bindParam(':idstatus', 1);
    }

    public static function acceptOpinion():void
    {

    }
}