<?php

namespace Project\Lib;

class DB {
    private static $pdo = null;
    private static $last_id = 0;

    public static function run() {
        $db_config = require (CONFIG_PATH . DIRECTORY_SEPARATOR . 'db.php');

        try {
            static::$pdo = new \PDO($db_config['dsn'], $db_config['user'], $db_config['password']);
            static::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch(\Exception $e) {
            d($e);
        }

    }

    public static function lastInsertId() {
        return static::$last_id;
    }

    public static function select($sql, $params = null) {
        $db = static::$pdo;
        //$db = new \PDO('asd', 'asd', 'asd');
        $stmt = $db->prepare($sql);
        $stmt->execute($params);
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    public static function insert($sql) {
        $db = static::$pdo;
        $result = $db->exec($sql);
        static::$last_id = $db->lastInsertId();
        return $result;
    }

    public static function update($sql) {
        $db = static::$pdo;
        $result = $db->exec($sql);
        return $result;
    }

    public static function delete($sql) {
        $db = static::$pdo;
        $result = $db->exec($sql);
        return $result;
    }
}