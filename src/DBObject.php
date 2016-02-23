<?php

namespace wcatron\CommonDBFramework;

abstract class DBObject {
    /**
     * @return string
     */
    abstract public function getID();

    /**
     * @param string
     * @return static|bool
     */
    abstract public static function getByID($id);
}

?>