<?php

use wcatron\CommonDBFramework\DB;

class TestDB extends DB {
    var $db = false;
    function connect() {
        echo "Connecting... ";
        $this->db = true;
        echo "Connected.";
    }
}

?>