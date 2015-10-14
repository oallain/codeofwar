<?php

class Item {
    
    private $type; // ItemType
    
    public function getType() {
        return $this->type;
    }

    public function setType(ItemType $type) {
        $this->type = $type;
        return $this;
    }


}
