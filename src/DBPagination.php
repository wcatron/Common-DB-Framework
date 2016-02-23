<?php

namespace wcatron\CommonDBFramework;

class DBPagination {
    var $skip;
    var $limit;
    var $orderKey;
    var $search;
    var $order;

    function __construct($skip, $limit, $orderKey, $order, $search) {
        $this->skip = $skip;
        $this->limit = $limit;
        $this->orderKey = $orderKey;
        if ($order == 'asc') {
            $this->order = 1;
        } else {
            $this->order = -1;
        }
        $this->search = $search;
    }
}

?>