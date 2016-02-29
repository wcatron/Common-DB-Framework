<?php

namespace wcatron\CommonDBFramework;

abstract class DBObject {

    /**
     * @var DB Class name for default DB class used.
     */
    protected static $dbClass = DB::class;
    /**
     * @return string
     */
    public function getID() {

    }
    /**
     * @return DB
     */
    public static function getDBInstance() {
        $class = static::$dbClass;
        return $class::getInstance();
    }

    /**
     * @param $class string Class that inherits DB.
     */
    public static function setDBInstance($class) {
        static::$dbClass = $class;
    }
}

?>