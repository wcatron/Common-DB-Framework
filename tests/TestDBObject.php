<?php

use wcatron\CommonDBFramework\DBObject;

class TestDBObject extends DBObject {
    static $dbClass = TestDB::class;

    var $id = null;
    var $field = null;

    /**
     * @param string
     * @return static|bool
     */
    public static function getByID($id) {
        $instance = static::getDBInstance();
        return $instance->getObjectByID(static::class, $id);
    }

    function toArray() {
        return [
            "id"    => $this->id,
            "field" => $this->field
        ];
    }

    function fromArray($array) {
        $this->id = $array['id'];
        $this->field = $array['field'];
    }

    /**
     * @return TestDB
     */
    public static function getDBInstance() {
        return parent::getDBInstance();
    }
}

?>