<?php

use wcatron\CommonDBFramework\DB;

class TestDB extends DB {
    var $db = false;
    function connect() {
        if ($this->db == false) {
            echo "Connecting... ";
            $this->db = true;
            echo "Connected.";
        }
    }
}

?>