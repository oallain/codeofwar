<?php

class GameMap {
    
    private $id;
    private $cells;
    private $currentTurn;
    private $iaList;
    
    public function __construct() {
        $this->cells = array();
        $this->iaList = array();
    }

    public function getId() {
        return $this->id;
    }

    public function getCells() {
        return $this->cells;
    }

    public function getCurrentTurn() {
        return $this->currentTurn;
    }

    public function getIaList() {
        return $this->iaList;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setCells( array $cells) {
        $this->cells = $cells;
        return $this;
    }

    public function setCurrentTurn($currentTurn) {
        $this->currentTurn = $currentTurn;
        return $this;
    }

    public function setIaList( array $iaList) {
        $this->iaList = $iaList;
        return $this;
    }
    
    public function addIa( IAInfo $ia) {
        $this->iaList[] = $ia;
        return $this;
    }
    
    public function fromStdCLass($stdClass) {
        $this->currentTurn = $stdClass->currentTurn;
        foreach ($stdClass->iaList as $iaStdClass) {
            $iaInfo = new IAInfo();
            $iaInfo->fromStdClass($iaStdClass);
            $this->addIa($iaInfo);
        }
    }
    
}
