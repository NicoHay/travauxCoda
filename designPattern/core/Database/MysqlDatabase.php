<?php

namespace Core\Database;

use \PDO;

class MysqlDatabase extends Database
{

    private $user;
    private $pass;
    private $dsn;
    private $pdo;

    public function __construct($user, $pass, $dsn)
    {

        $this->user = $user;
        $this->pass = $pass;
        $this->dsn = $dsn;

    }

    private function getPDO()
    {


        if ($this->pdo === null) {    //     TODO!

            $pdo = new PDO($this->dsn, $this->user, $this->pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $this->pdo = $pdo;
        }


        return $this->pdo;
    }

    public function query($statement, $class_name = null, $one = false)
    {

        $req = $this->getPDO()->query($statement);


        if ($class_name === null) {

            $req->setFetchMode(PDO::FETCH_OBJ);

        } else {

            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }

        if ($one) {

            $datas = $req->fetch();

        } else {

            $datas = $req->fetchAll();
        }

        return $datas;
    }


    public function prepare($statement, $attributes, $class_name, $one = false)
    {

        $req = $this->getPDO()->prepare($statement);
        $req->execute($attributes);
        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);

        if ($one) {

            $datas = $req->fetch();

        } else {


            $datas = $req->fetchAll();
        }

        return $datas;
    }

}
