<?php

use wcatron\CommonDBFramework\DB;

class OtherDB extends DB {
    var $db = false;

    function connect() {
        if ($this->db == false) {
            echo "Connecting to other... ";
            $this->db = true;
            echo "Connected to other.";
        }
    }

    function getObjectByID($object, $id) {
        /** @var TestDBObject $object */
        $object = new $object();
        if ($id == "1") {
            $object->fromArray([
                                   "id"    => "1",
                                   "field" => "other"
                               ]);
        } else if ($id == "2") {
            $object->fromArray([
                                   "id"    => "2",
                                   "field" => "other"
                               ]);
        }
        return $object;
    }
}

?>