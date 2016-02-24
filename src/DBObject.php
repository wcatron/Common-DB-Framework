<?php

namespace wcatron\CommonDBFramework;

interface DBObject {
    /**
     * @return string
     */
    public function getID();

    /**
     * @param string
     * @return static|bool
     */
    public static function getByID($id);
}

?>