<?php

class Cell {

    private $id;
    private $item; // Item
    private $occupant; // IAInfo
    private $bottom;
    private $left;
    private $right;
    private $top;
    
    public function getId() {
        return $this->id;
    }

    public function getItem() {
        return $this->item;
    }

    public function getOccupant() {
        return $this->occupant;
    }

    public function getBottom() {
        return $this->bottom;
    }

    public function getLeft() {
        return $this->left;
    }

    public function getRight() {
        return $this->right;
    }

    public function getTop() {
        return $this->top;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setItem(Item $item) {
        $this->item = $item;
        return $this;
    }

    public function setOccupant(IAInfo $occupant) {
        $this->occupant = $occupant;
        return $this;
    }

    public function setBottom($bottom) {
        $this->bottom = $bottom;
        return $this;
    }

    public function setLeft($left) {
        $this->left = $left;
        return $this;
    }

    public function setRight($right) {
        $this->right = $right;
        return $this;
    }

    public function setTop($top) {
        $this->top = $top;
        return $this;
    }


}
