<?php

namespace App\Core;


class Database
{
    private static $db;
    protected $model = '';


    protected function dbConnect()
    {
        if (self::$db === null) {
            $data = require __DIR__ . './../Config/config.php';
            return new \PDO('mysql:host=' . $data['db_host'] . ';dbname=' . $data['db_name'] . ';charset=utf8',
                $data['db_user'], $data['db_password'],
                array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
        }
        return self::$db;

    }

    protected function custom_query($sql)
    {
        $db = $this->dbConnect();
        $req = $db->query($sql);


        if ($req->rowCount() == 0) {
            return Null;
        } elseif ($req->rowCount() == 1) {
            if (!is_null($this->model)) {

                return $req->fetchObject($this->model);
            } else {

                return $req->fetchAll();
            }

        } else {
            if (!is_null($this->model)) {
                while ($datas = $req->fetchObject($this->model)) {
                    $custom_array[] = new $this->model($datas);
                }

                $req->closeCursor();
                return $custom_array;

            } else {
                return $req->fetchAll();
            }
        }
    }

}