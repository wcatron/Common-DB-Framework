<?php

namespace wcatron\CommonDBFramework;

class LinkedObject {
    protected $object_class;
    protected $key;
    protected $id;
    protected $object = false;
    protected $modifier;

    public function __construct($object_class, $key) {
        $this->object_class = $object_class;
        $this->key = $key;
    }

    public function get() {
        if ($this->object) {
            return $this->object;
        }
        $this->object = $this->getObject();
        if (isset($this->modifier)) {
            $modify = $this->modifier;
            $modify($this->object);
        }
        return $this->object;
    }

    protected function getObject() {
        /** @var DBObject $class */
        $class = $this->object_class;
        return $class::getByID($this->id);
    }

    public function getID() {
        return $this->id;
    }

    public function set(DBObject $object) {
        $this->setID($object->getID(), $object);
    }

    public function setID($id, $object = false) {
        if ($this->id === $id) {
            return false;
        }
        $this->id = $id;
        $this->object = $object;
        return true;
    }

    public function exists() {
        return !empty($this->id);
    }

    public function toArray(&$array) {
        $array[$this->key] = $this->getID();
    }

    public function fromArray($array) {
        $this->setID($array[$this->key]);
    }

    public function setModifier(&$modifier) {
        $this->modifier = $modifier;
    }

    public function __toString() {
        return "Linked object of type {$this->object_class} with {$this->key} = {$this->id}\n";
    }

    public function isEqual(DBObject $object) {
        return ($this->getID() == $object->getID());
    }
}
