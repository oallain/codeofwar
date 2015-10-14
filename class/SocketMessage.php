<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SocketMessage
 *
 * @author olivier
 */
class SocketMessage {
   
    private $type;
    private $data;
   
    public function __construct($stdClass) {
        $this->type = $stdClass->type;
        $this->data = $stdClass->data;
    }

    public function init() {
        $gameMap = new GameMap();
        $gameMap->fromStdClass($this->data);
        var_dump($gameMap);
    }
}
