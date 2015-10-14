<?php

/**
 *
 * @author olivier
 */
class IAInfo {
    
    private $avatar; // String
    private $id; // Float
    private $items; // Array
    private $name; // String
    private $pm; // Int
    private $invisibilityDuration;
    
    public function getAvatar() {
        return $this->avatar;
    }

    public function getId() {
        return $this->id;
    }

    public function getItems() {
        return $this->items;
    }

    public function getName() {
        return $this->name;
    }

    public function getPm() {
        return $this->pm;
    }

    public function setAvatar($avatar) {
        $this->avatar = $avatar;
        return $this;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setItems( array $items) {
        $this->items = $items;
        return $this;
    }
    
    public function addItem($item) {
        $this->items[] = $item;
        return $this;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setPm($pm) {
        $this->pm = $pm;
        return $this;
    }

    public function getInvisibilityDuration() {
        return $this->invisibilityDuration;
    }

    public function setInvisibilityDuration($invisibilityDuration) {
        $this->invisibilityDuration = $invisibilityDuration;
        return $this;
    }

    public function __construct() {
        $this->setItems(array());
    }

    public function fromStdClass($iaStdClass) {
        $this->avatar = $iaStdClass->avatar;
        $this->id = $iaStdClass->id;
        $this->invisibilityDuration = $iaStdClass->invisibilityDuration;
        //$this->items = $iaStdClass->items;
        $this->name = $iaStdClass->name;
        $this->pm = $iaStdClass->pm;
    }

}
