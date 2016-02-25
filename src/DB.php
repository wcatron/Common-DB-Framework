<?php

namespace wcatron\CommonDBFramework;

abstract class DB {
    /**
     * @var array Contains configuration data dependant on parent database type.
     */
    private $config;
    /**
     * @return string
     */
    private static $instance;
    /**
     * Gets the singleton instance of the DB. Used throughout the framework.
     * @return static Returns the singlton DB object.
     */
    public static function getInstance($connect = true) {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        if ($connect) {
            static::$instance->connect();
        }
        return static::$instance;
    }

    public static function configure($config) {
        static::getInstance(false)->config = $config;
    }

    function connect() {
    }

}

?>