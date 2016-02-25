<?php

require 'TestDB.php';

class DBTest extends PHPUnit_Framework_TestCase {
    public function testSingletonness() {
        $instance = TestDB::getInstance(false);
        $this->assertTrue(TestDB::getInstance(false)->db == false, "Connect has not run.");
        TestDB::configure(
            [
                "host" => "localhost",
                "user" => "admin",
                "pass" => "password",
                "db"   => "example"
            ]);
        $this->assertTrue(TestDB::getInstance(false)->db == false, "Connect has not run.");
        $this->assertTrue(TestDB::getInstance()->db);
        $this->assertEquals($instance, TestDB::getInstance());
    }
}


?>