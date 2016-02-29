<?php

require 'TestDB.php';
require 'OtherDB.php';
require 'TestDBObject.php';

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
        TestDB::unconfigure();
        $instance = TestDB::getInstance(false);
        $this->assertTrue(TestDB::getInstance(false)->db == false, "TestDB has been reset.");
    }

    public function testDependencyInjection() {
        $object = TestDBObject::getByID("1");
        $this->assertEquals("test", $object->field);

        TestDBObject::setDBInstance(OtherDB::class);
        $objectB = TestDBObject::getByID("1");
        $this->assertEquals("other", $objectB->field);
    }
}


?>