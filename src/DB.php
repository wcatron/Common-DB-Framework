<?php

namespace wcatron\CommonDBFramework;

class DB {
    /**
     * @var array Contains configuration data dependant on parent database type.
     */
    protected $config;
    /**
     * @var DB[]
     */
    private static $instances = [];
    /**
     * Gets the singleton instance of the DB. Used throughout the framework.
     * @return static Returns the singlton DB object.
     */
    public static function getInstance($connect = true) {
        if (!isset(self::$instances[static::class])) {
            self::$instances[static::class] = new static();
        }
        /** @var DB $instance */
        $instance = self::$instances[static::class];
        if ($connect) {
            $instance->connect();
        }
        return$instance;
    }

    public static function configure($config) {
        static::getInstance(false)->config = $config;
    }

    function connect() {
    }

    /**
     * Protected constructor to prevent creating a new instance of the
     * *Singleton* via the `new` operator from outside of this class.
     */
    protected function __construct()
    {
    }

    /**
     * Private clone method to prevent cloning of the instance of the
     * *Singleton* instance.
     *
     * @return void
     */
    private function __clone()
    {
    }

    /**
     * Private unserialize method to prevent unserializing of the *Singleton*
     * instance.
     *
     * @return void
     */
    private function __wakeup()
    {
    }

}

?>