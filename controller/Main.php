<?php

class Main {

    private $socket;

    public function getSocket() {
        return $this->socket;
    }

    public function setSocket($socket) {
        $this->socket = $socket;
        return $this;
    }

    public function init() {
        Log::write('init...');
        $this->setSocket(new SocketConnection(SOCKET_ADDRESS, SOCKET_PORT));
        $this->getSocket()->connect();
    }

    public function authenticate() {
        Log::write('authenticate...');
        $message = array(
            "type" => "authenticate",
            "name" => IA_NAME,
            "avatar" => IA_AVATAR,
            "token" => IA_TOKEN,
            "profil" => IA_PROFIL,
        );
        $this->getSocket()->write($message);
    }
    
    public function end(){
        $this->getSocket()->close();
    }
    
    public function run() {
        Log::write('run...');
        $i = 0;
        while (true) {
            Log::write('step...');
            $message = $this->getSocket()->read();

            if($i == 1) {

                $socketMessage = new SocketMessage($message);
                $socketMessage->init();
                die();
            }
            
            $i++;
        }
    }

}
