<?php declare (strict_types = 1);

namespace Models;

class OpinionsModel extends AbstractModel
{

    private const OPINIONS = 'opinions';

    
    public static function getOpinions():array
    {
       return self::getAll('opinions');
    }

    public static function createOpinion(string $surname,int|string $note,string $comments):void
    {
        $req = parent::getConnection()->prepare("INSERT INTO opinions(op_surname,op_note,op_comments) VALUES (:surname,:note,:comments)" );
        $req->bindParam(':surname', $surname);
        $req->bindParam(':note', $note);
        $req->bindParam(':comments', $comments);
        $req->execute();
        $req->closeCursor();
    }

    public static function accept(int|string $op_id):void
    {
        $req = parent::getConnection()->prepare("UPDATE opinions SET op_status = :op_status WHERE op_id = :op_id");
        $req->bindValue(':op_id', $op_id);
        $req->bindValue(':op_status', 'accept');
        $req->execute();
        $req->closeCursor();
    }

    public static function reject(int|string $op_id):void
    {
        $req = parent::getConnection()->prepare("UPDATE opinions SET op_status = :op_status WHERE op_id = :op_id");
        $req->bindValue(':op_id', $op_id);
        $req->bindValue(':op_status', 'reject');
        $req->execute();
        $req->closeCursor();

    }

    public static function pending():int|string
    {
        $req = parent::getConnection()->prepare("SELECT COUNT(*) FROM opinions WHERE op_status = 'pending'");
        $req->execute();
        $nbPending = $req->fetch(\PDO::FETCH_NUM);
        $req->closeCursor();
        return $nbPending[0];

    }
    public static function getPending():array
    {
        $req = parent::getConnection()->prepare("SELECT * FROM opinions WHERE op_status = 'pending'");
        $req->execute();
        $result = $req->fetchAll();
        $req->closeCursor();
        return $result;
    }
    public static function getAccept():array
    {
        $req = parent::getConnection()->prepare("SELECT * FROM opinions WHERE op_status = 'accept' ORDER BY op_createAt DESC");
        $req->execute();
        $result = $req->fetchAll();
        $req->closeCursor();
        return $result;
    }

    public static function getDays($op_id):int
    {
        $req = self::getConnection()->prepare("SELECT TO_DAYS(op_createAt) FROM opinions WHERE op_id = :op_id");
        $req2 = self::getConnection()->prepare("SELECT TO_DAYS(NOW))");
        
    }
    
    public static function getLimitOp():array
    {
        $req = parent::getConnection()->prepare("SELECT * FROM opinions  WHERE op_status='accept' ORDER BY op_createAt DESC LIMIT 5;");
        $req->execute();
        $result = $req->fetchAll();
        $req->closeCursor();
        return $result;
    }
}